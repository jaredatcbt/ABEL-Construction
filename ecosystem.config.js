module.exports = {
    apps: [
      {
        name: 'abel-construction',
        script: 'php',
        args: 'artisan serve',
        watch: true,
        interpreter: 'none',
        env: {
          APP_ENV: 'local',
          APP_DEBUG: true,
          APP_URL: 'http://localhost:8000',
        },
      },
    ],
  };
