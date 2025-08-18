# Laravel-meh

### Установка

1. **Запуск контейнеров**
   ```bash
   docker compose up --build
   ```

2. **Установка зависимостей PHP**
   ```bash
   composer install
   ```

3. **Конфигурация окружения**
   ```bash
   cp .env.example .env
   ```

4. **Генерация ключа приложения**
   ```bash
   php artisan key:generate
   ```

5. **Выполнение миграций**
   ```bash
   php artisan migrate
   ```

6. **Установка зависимостей фронтенда**
   ```bash
   npm install
   ```

7. **Сборка ресурсов**
   ```bash
   npm run dev
   ```

### Дополнительные команды:

### Загрузка вопросов
```bash
php artisan app:yeahub-questions-load
```

### Создание администратора
```bash
php artisan app:create-user-admin
```


### Режим разработки
```bash
npm run dev
```

### Сборка для продакшена
```bash
npm run build
```
