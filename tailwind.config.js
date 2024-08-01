module.exports = {
    content: [
      './resources/views/**/*.blade.php',
      './public/**/*.html', // Statik HTML dosyaları kullanıyorsanız
    ],
    theme: {
      extend: {
        height: {
            '30rem': '30rem',
          },
      },
    },
    plugins: [],
  }
