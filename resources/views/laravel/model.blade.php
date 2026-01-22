<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Laravel 10 - Soft Delete</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #f4f6f8;
    color: #333;
}

.container {
    max-width: 900px;
    margin: 40px auto;
    background: #fff;
    padding: 30px;
    border-radius: 8px;
}

h1 {
    text-align: center;
    margin-bottom: 15px;
    color: #2c3e50;
}

.intro {
    text-align: center;
    margin-bottom: 30px;
    color: #555;
}

section {
    margin-bottom: 30px;
}

h2 {
    margin-bottom: 10px;
    color: #34495e;
}

pre {
    background: #1e1e1e;
    color: #00ffcc;
    padding: 15px;
    border-radius: 6px;
    overflow-x: auto;
}

.card {
    background: #ecf0f1;
    padding: 15px;
    border-left: 5px solid #3498db;
    margin-bottom: 10px;
    border-radius: 5px;
}

.card h3 {
    margin-bottom: 5px;
}

.card.danger {
    border-left-color: #e74c3c;
}

footer {
    text-align: center;
    margin-top: 40px;
    font-size: 14px;
    color: #777;
}
</style>
<body>

<div class="container">
    <h1>Laravel 10 — Soft Delete</h1>
    <p class="intro">
        Bugun Laravel 10 da Soft Delete qanday ishlashini o‘rgandim.
        Ushbu sahifada Soft Delete tushunchasi va asosiy methodlar keltirilgan.
    </p>

    <section>
        <h2>Soft Delete nima?</h2>
        <p>
            Soft Delete — bu ma’lumotni bazadan butunlay o‘chirmasdan,
            vaqtincha o‘chirilgan deb belgilashdir.
        </p>
        <p>
            Laravel bu jarayonni <code>deleted_at</code> ustuni orqali bajaradi.
        </p>
    </section>

    <section>
        <h2>Modelda Soft Delete yoqish</h2>
        <pre>
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
}
        </pre>
    </section>

    <section>
        <h2>Asosiy Methodlar</h2>

        <div class="card">
            <h3>delete()</h3>
            <p>Ma’lumotni soft delete qiladi (bazadan o‘chirmaydi).</p>
        </div>

        <div class="card">
            <h3>withTrashed()</h3>
            <p>O‘chirilgan va o‘chirilmagan barcha ma’lumotlarni chiqaradi.</p>
        </div>

        <div class="card">
            <h3>onlyTrashed()</h3>
            <p>Faqat soft delete qilingan ma’lumotlarni chiqaradi.</p>
        </div>

        <div class="card">
            <h3>restore()</h3>
            <p>Soft delete qilingan ma’lumotni qayta tiklaydi.</p>
        </div>

        <div class="card danger">
            <h3>forceDelete()</h3>
            <p>Ma’lumotni bazadan butunlay o‘chiradi.</p>
        </div>
    </section>

    <section>
        <h2>Xulosa</h2>
        <p>
            Soft Delete ma’lumotlarni xavfsiz saqlash va ularni qayta tiklash
            imkonini beradi. Laravel’da bu juda qulay va samarali ishlaydi.
        </p>
    </section>

    <footer>
        <p>© 2026 | Laravel 10 Soft Delete | Amirxon</p>
    </footer>
</div>

</body>
</html>
