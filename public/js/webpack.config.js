module.exports = {
    entry: './nnetwork.js', // путь к вашему файлу-модулю
    output: {
        filename: 'bundle.js', // имя файла, который будет сгенерирован в результате
    },
    module: {
        rules: [
            {
                test: /\.js$/, // обрабатываем только JS-файлы
                exclude: /node_modules/, // исключаем обработку файлов в папке node_modules
                use: {
                    loader: 'babel-loader', // используем babel-loader для транспиляции
                    options: {
                        presets: ['@babel/preset-env'], // указываем, какие пресеты Babel использовать
                    },
                },
            },
        ],
    },
};
