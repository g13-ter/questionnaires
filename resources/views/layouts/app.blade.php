<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', ' Questions')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
        }
        h1 {
            color: #333;
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        h2 {
            color: #555;
        }
        .question-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px 0;
            background-color: #fafafa;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .answer-box {
            border: 1px solid #bbb;
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
        }
        .success-msg {
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border: 2px solid #4CAF50;
            border-radius: 5px;
            margin: 20px 0;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Simple Google Forms layout */
        .survey-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
        }
        .survey-header {
            background-color: #f0f0f0;
            padding: 20px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .survey-header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
            border: none;
            text-align: left;
            color: #333;
        }
        .survey-description {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
        .info-section, .questions-section {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .info-section h2, .questions-section h2 {
            color: #333;
            margin: 0 0 15px 0;
            font-size: 18px;
        }
        .question-card {
            background: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
        }
        .question-header {
            margin-bottom: 10px;
        }
        .question-number {
            display: inline-block;
            background: #666;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 12px;
            margin-right: 8px;
        }
        .question-header h3 {
            display: inline;
            margin: 0;
            color: #333;
            font-size: 16px;
        }
        .required-badge {
            display: none;
        }
        .question-description {
            margin: 10px 0;
            color: #666;
            font-size: 14px;
        }
        .submit-section {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .submit-btn {
            background: #333;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background: #555;
        }
        .submit-note {
            margin: 10px 0 0 0;
            color: #666;
            font-size: 12px;
        }

        .error-msg {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1> Questions </h1>
        @yield('content')
    </div>
</body>
</html>