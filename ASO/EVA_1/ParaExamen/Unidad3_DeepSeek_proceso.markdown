以下是对《TEMA3_1 – PROCESOS Y TAREAS LINUX》文档的**系统化总结与学习笔记**，涵盖Linux进程、任务管理、启动流程与自动化任务等核心内容：

---

## 📘 **Linux 进程与任务管理学习笔记**

---

### 一、进程基础概念

#### 1.1 什么是进程？
- 进程是**正在执行的程序**，是系统资源分配的基本单位。
- 一个程序多次执行会产生多个独立的进程（共享代码段，但数据段独立）。

#### 1.2 进程生命周期
- **创建** → **执行** → **终止**
- 创建方式：
  - 系统启动
  - 用户命令（终端、图形界面）
  - 系统调用：`fork()`、`exec()`、`clone()`

#### 1.3 进程状态
- **运行 (R)**：正在使用CPU
- **就绪**：可运行，等待CPU
- **阻塞/睡眠 (S/D)**：等待事件（如I/O）
- **停止 (T)**：被暂停
- **僵尸 (Z)**：已结束，但父进程未回收资源

#### 1.4 进程通信（IPC）
- 方式：共享内存、消息传递、信号量等
- 目的：数据传递、同步、避免竞争

---

### 二、Linux 进程管理命令

#### 2.1 查看进程
- `ps`：查看进程快照
  - `ps aux`：BSD风格，显示所有进程
  - `ps -ef`：System V风格
- `top` / `htop`：动态查看进程与系统资源
- `pstree`：以树状显示进程关系

#### 2.2 控制进程
- `kill`：发送信号给进程
  - `SIGTERM(15)`：优雅终止
  - `SIGKILL(9)`：强制终止
- `killall`：根据进程名终止
- `nice` / `renice`：调整进程优先级（-20 最高，19 最低）

#### 2.3 前台/后台任务
- `&`：后台执行
- `Ctrl+Z`：暂停进程并放入后台
- `jobs`：查看后台任务
- `fg` / `bg`：将任务切换到前台/后台

#### 2.4 其他实用命令
- `nohup`：忽略挂起信号，退出终端仍运行
- `sleep`：暂停指定时间
- `time`：测量命令执行时间
- `wait`：等待后台进程结束

---

### 三、Linux 启动流程与服务管理

#### 3.1 启动阶段
1. **BIOS/UEFI** → 硬件自检
2. **Boot Loader (GRUB)** → 加载内核
3. **Kernel + initramfs** → 初始化硬件
4. **init/systemd** → 第一个用户进程（PID=1）
5. **登录界面**（文本或图形）

#### 3.2 服务管理
- **System V（旧）**：
  - 使用 `/etc/init.d/` 脚本
  - `service <name> start|stop|restart`
  - `chkconfig` 或 `update-rc.d` 管理服务
- **systemd（新）**：
  - 使用 `systemctl` 管理服务
  - 命令：`start|stop|restart|enable|disable|status`
  - 日志：`journalctl`

---

### 四、自动化任务

#### 4.1 `at`：一次性定时任务
- 语法：`at <时间>`
- 示例：`at 14:30` → 输入命令 → `Ctrl+D`
- 管理：`atq`（查看）、`atrm`（删除）

#### 4.2 `cron`：周期性任务
- 用户任务：`crontab -e`
- 系统任务：`/etc/crontab`、`/etc/cron.d/`
- 时间格式：`分 时 日 月 周 命令`
- 示例：`0 2 * * * /backup.sh` → 每天2点执行

#### 4.3 `anacron`：补执行错过任务
- 适用于非24小时开机的系统
- 配置：`/etc/anacrontab`

---

### 五、特殊权限与 `/proc` 目录

#### 5.1 特殊权限
- **SUID**：执行时以文件所有者身份运行
- **SGID**：执行时以文件所属组身份运行，或目录中新文件继承组
- **Sticky Bit**：目录中只有文件所有者可删除自己的文件

#### 5.2 `/proc` 虚拟文件系统
- 包含系统与进程的实时信息
- 示例：
  - `/proc/cpuinfo`：CPU信息
  - `/proc/meminfo`：内存信息
  - `/proc/<PID>/`：进程详细信息

---

### 六、系统监控命令

- `uptime`：系统运行时间与负载
- `free`：内存使用情况
- `vmstat`、`iostat`、`mpstat`：系统性能统计
- `df` / `du`：磁盘空间使用

---

## ✅ 总结要点

| 主题 | 关键内容 |
|------|-----------|
| 进程管理 | `ps`, `top`, `kill`, `nice`, `jobs`, `fg/bg` |
| 启动流程 | BIOS → GRUB → Kernel → init/systemd |
| 服务管理 | `systemctl`（systemd）或 `service`（SysV） |
| 定时任务 | `at`（一次性）、`cron`（周期性）、`anacron`（补执行） |
| 权限控制 | SUID、SGID、Sticky Bit |
| 系统信息 | `/proc`、`dmesg`、`journalctl` |

---

如果有需要修改或者补充的地方，可以随时告诉我。