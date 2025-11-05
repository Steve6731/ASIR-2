<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>多语言翻译工具</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 900px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        header {
            background: linear-gradient(to right, #4a00e0, #8e2de2);
            color: white;
            padding: 25px 30px;
            text-align: center;
        }
        
        h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        .translation-area {
            display: flex;
            flex-wrap: wrap;
            padding: 25px;
        }
        
        .input-section, .output-section {
            flex: 1;
            min-width: 300px;
            padding: 15px;
        }
        
        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            color: #333;
        }
        
        .section-title h2 {
            font-size: 1.3rem;
            font-weight: 600;
        }
        
        .language-selector {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        select {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: white;
            font-size: 0.9rem;
            cursor: pointer;
        }
        
        .text-box {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        textarea {
            width: 100%;
            height: 250px;
            padding: 20px;
            border: none;
            resize: none;
            font-size: 1.1rem;
            line-height: 1.6;
            outline: none;
            background-color: #f9f9f9;
        }
        
        .input-text {
            border-bottom: 3px solid #4a00e0;
        }
        
        .output-text {
            border-bottom: 3px solid #00c6ff;
            background-color: #f0f8ff;
        }
        
        .text-actions {
            display: flex;
            justify-content: space-between;
            padding: 12px 20px;
            background-color: white;
            border-top: 1px solid #eee;
        }
        
        .action-btn {
            background: none;
            border: none;
            color: #555;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
            transition: all 0.2s;
            padding: 5px 10px;
            border-radius: 6px;
        }
        
        .action-btn:hover {
            background-color: #f0f0f0;
            color: #333;
        }
        
        .translate-btn-container {
            text-align: center;
            padding: 20px;
        }
        
        .translate-btn {
            background: linear-gradient(to right, #4a00e0, #8e2de2);
            color: white;
            border: none;
            padding: 14px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(74, 0, 224, 0.3);
        }
        
        .translate-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(74, 0, 224, 0.4);
        }
        
        .translate-btn:active {
            transform: translateY(1px);
        }
        
        .char-count {
            color: #777;
            font-size: 0.85rem;
        }
        
        @media (max-width: 768px) {
            .translation-area {
                flex-direction: column;
            }
            
            .input-section, .output-section {
                min-width: 100%;
            }
            
            h1 {
                font-size: 1.8rem;
            }
        }
        
        .loading {
            display: none;
            text-align: center;
            padding: 10px;
            color: #4a00e0;
        }
        
        .spinner {
            border: 3px solid rgba(74, 0, 224, 0.2);
            border-radius: 50%;
            border-top: 3px solid #4a00e0;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin-right: 10px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>多语言翻译工具</h1>
            <p class="subtitle">支持多种语言互译，快速准确</p>
        </header>
        
        <div class="translation-area">
            <div class="input-section">
                <div class="section-title">
                    <h2>输入原文</h2>
                    <div class="language-selector">
                        <span>源语言:</span>
                        <select id="source-language">
                            <option value="zh">中文</option>
                            <option value="en">英语</option>
                            <option value="ja">日语</option>
                            <option value="ko">韩语</option>
                            <option value="fr">法语</option>
                            <option value="es">西班牙语</option>
                        </select>
                    </div>
                </div>
                
                <div class="text-box input-text">
                    <textarea id="input-text" placeholder="请输入要翻译的文本..."></textarea>
                    <div class="text-actions">
                        <div>
                            <button class="action-btn" id="clear-input">
                                <i>🗑️</i> 清除
                            </button>
                        </div>
                        <div class="char-count">
                            <span id="input-count">0</span> 字符
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="output-section">
                <div class="section-title">
                    <h2>翻译结果</h2>
                    <div class="language-selector">
                        <span>目标语言:</span>
                        <select id="target-language">
                            <option value="en">英语</option>
                            <option value="zh" selected>中文</option>
                            <option value="ja">日语</option>
                            <option value="ko">韩语</option>
                            <option value="fr">法语</option>
                            <option value="es">西班牙语</option>
                        </select>
                    </div>
                </div>
                
                <div class="text-box output-text">
                    <textarea id="output-text" readonly placeholder="翻译结果将显示在这里..."></textarea>
                    <div class="text-actions">
                        <div>
                            <button class="action-btn" id="copy-output">
                                <i>📋</i> 复制
                            </button>
                            <button class="action-btn" id="speak-output">
                                <i>🔊</i> 朗读
                            </button>
                        </div>
                        <div class="char-count">
                            <span id="output-count">0</span> 字符
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="loading" id="loading">
            <div class="spinner"></div>
            正在翻译中...
        </div>
        
        <div class="translate-btn-container">
            <button class="translate-btn" id="translate-btn">
                <i>🌐</i> 立即翻译
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputText = document.getElementById('input-text');
            const outputText = document.getElementById('output-text');
            const sourceLanguage = document.getElementById('source-language');
            const targetLanguage = document.getElementById('target-language');
            const translateBtn = document.getElementById('translate-btn');
            const clearInputBtn = document.getElementById('clear-input');
            const copyOutputBtn = document.getElementById('copy-output');
            const speakOutputBtn = document.getElementById('speak-output');
            const inputCount = document.getElementById('input-count');
            const outputCount = document.getElementById('output-count');
            const loading = document.getElementById('loading');
            
            // 更新字符计数
            inputText.addEventListener('input', function() {
                inputCount.textContent = inputText.value.length;
            });
            
            // 清除输入
            clearInputBtn.addEventListener('click', function() {
                inputText.value = '';
                inputCount.textContent = '0';
            });
            
            // 复制翻译结果
            copyOutputBtn.addEventListener('click', function() {
                if (outputText.value) {
                    outputText.select();
                    document.execCommand('copy');
                    alert('翻译结果已复制到剪贴板！');
                } else {
                    alert('没有可复制的内容！');
                }
            });
            
            // 朗读翻译结果
            speakOutputBtn.addEventListener('click', function() {
                if (outputText.value) {
                    const utterance = new SpeechSynthesisUtterance(outputText.value);
                    utterance.lang = targetLanguage.value;
                    speechSynthesis.speak(utterance);
                } else {
                    alert('没有可朗读的内容！');
                }
            });
            
            // 翻译功能
            translateBtn.addEventListener('click', function() {
                const text = inputText.value.trim();
                if (!text) {
                    alert('请输入要翻译的文本！');
                    return;
                }
                
                // 显示加载动画
                loading.style.display = 'block';
                
                // 模拟翻译过程（实际应用中这里应该调用翻译API）
                setTimeout(function() {
                    // 这里只是模拟翻译结果
                    const sourceLang = sourceLanguage.value;
                    const targetLang = targetLanguage.value;
                    
                    let translatedText = '';
                    
                    // 简单的模拟翻译逻辑
                    if (sourceLang === 'zh' && targetLang === 'en') {
                        translatedText = 'This is a simulated translation result. In a real application, this would be replaced with actual translation from an API.';
                    } else if (sourceLang === 'en' && targetLang === 'zh') {
                        translatedText = '这是一个模拟的翻译结果。在实际应用中，这将通过API被实际的翻译结果替换。';
                    } else if (sourceLang === 'zh' && targetLang === 'ja') {
                        translatedText = 'これは模擬翻訳結果です。実際のアプリケーションでは、これはAPIからの実際の翻訳に置き換えられます。';
                    } else {
                        translatedText = `[模拟翻译结果] 从 ${sourceLanguage.options[sourceLanguage.selectedIndex].text} 到 ${targetLanguage.options[targetLanguage.selectedIndex].text} 的翻译: "${text}"`;
                    }
                    
                    outputText.value = translatedText;
                    outputCount.textContent = translatedText.length;
                    
                    // 隐藏加载动画
                    loading.style.display = 'none';
                }, 1500);
            });
            
            // 示例文本
            inputText.value = '欢迎使用多语言翻译工具！';
            inputCount.textContent = inputText.value.length;
        });
    </script>
</body>
</html>