<h1 align="center">Легкий фреймворк для json api</h1>

<h2 align="center">Развернуть проект:</h2>

Внимание! Докер должен быть включен.


```
git clone https://github.com/Maximilyanus29/rframework.git
cd rframework



```

```
docker-compose up -d
echo "жду соединений на http://localhost:8085"

или

на винде можно запустить файл start.bat
```

На винде можно просто запустить start.bat

перейти на страницу <a href="http://localhost:8085">http://localhost:8085</a>

<p>Общаемся только post запросами.</p>

<p>Роуты пока только статичные, лежат в /config/main.php(Регулярки ещё не умеет обрабатывать)</p>

<p>Content-type : application/json</p>

<p>Создан для проектов типа эхо-интеграции.</p>

<p>Потом доработаю под restfull</p>

<p>Не нужен композер</p>



