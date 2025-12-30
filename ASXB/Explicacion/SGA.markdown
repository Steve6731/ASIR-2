[返回 Main](./Main.markdown)  
在Oracle数据库中，**SGA（System Global Area，系统全局区）** 是数据库实例的核心内存结构，用于存储数据库实例运行期间所需的数据和控制信息。SGA在实例启动时分配，关闭时释放，由所有服务器进程共享访问。

## **SGA的主要组件：**

### 1. **数据库缓冲区缓存（Database Buffer Cache）**
- 存储从数据文件读取的数据块副本
- 减少磁盘I/O，提高数据访问速度
- 包含：
  - 脏缓冲区（已修改但未写入磁盘）
  - 干净缓冲区（与磁盘一致）
  - 空闲缓冲区（可重用）

### 2. **重做日志缓冲区（Redo Log Buffer）**
- 临时存储对数据库所做的更改（重做条目）
- 确保事务的持久性和恢复能力
- 由LGWR进程定期写入重做日志文件

### 3. **共享池（Shared Pool）**
- **库缓存（Library Cache）**：存储SQL语句、执行计划、PL/SQL代码
- **数据字典缓存（Dictionary Cache）**：存储数据库对象元数据
- **结果缓存（Result Cache）**：存储SQL查询结果
- **服务器结果缓存**：存储PL/SQL函数结果

### 4. **大池（Large Pool）**
- 用于共享服务器、并行查询、RMAN备份等操作的大内存分配
- 减少共享池的碎片

### 5. **Java池（Java Pool）**
- 存储Java虚拟机（JVM）中Java代码和数据
- 用于Java存储过程和Java应用

### 6. **流池（Streams Pool）**
- Oracle Streams复制技术专用
- 存储捕获和应用进程的消息队列

### 7. **固定SGA（Fixed SGA）**
- 存储数据库实例的内部控制信息
- 大小固定，由Oracle自动管理

## **查看SGA信息：**

```sql
-- 查看SGA整体信息
SHOW SGA;

-- 查看详细SGA组件
SELECT * FROM V$SGA;

-- 查看SGA各组件大小
SELECT component, current_size/1024/1024 as "Size(MB)"
FROM V$SGA_DYNAMIC_COMPONENTS
WHERE current_size > 0;

-- 查看SGA建议值（需要STATISTICS_LEVEL=TYPICAL或ALL）
SELECT * FROM V$SGA_TARGET_ADVICE;
```

## **SGA管理方式：**

### 1. **手动SGA管理**
```sql
-- 手动设置各组件大小
ALTER SYSTEM SET SHARED_POOL_SIZE = 256M;
ALTER SYSTEM SET DB_CACHE_SIZE = 512M;
ALTER SYSTEM SET LARGE_POOL_SIZE = 64M;
```

### 2. **自动SGA管理（推荐）**
```sql
-- 设置SGA总大小，Oracle自动分配各组件
ALTER SYSTEM SET SGA_TARGET = 2G;

-- 启用自动内存管理（包括SGA和PGA）
ALTER SYSTEM SET MEMORY_TARGET = 3G;
```

## **重要特性：**

1. **共享性**：所有服务器进程共享访问
2. **动态调整**：多数组件可在运行时动态调整
3. **持久性**：数据在实例运行期间存在，实例关闭时丢失
4. **ASMM（Automatic Shared Memory Management）**：自动优化各组件大小

## **最佳实践：**
- 对于OLTP系统，SGA通常占物理内存的40-60%
- 对于DSS/数据仓库，可分配更大比例
- 使用自动内存管理简化维护
- 监控命中率确保SGA配置合理

SGA是Oracle性能调优的关键区域，合理配置对数据库性能有显著影响。