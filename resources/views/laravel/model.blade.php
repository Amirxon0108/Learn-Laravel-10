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
    body {
      font-family: Arial, sans-serif;
      background: #f4f6fb;
      color: #1f2a44;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    h1 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 28px;
      color: #0f1a33;
    }

    p.subtitle {
      text-align: center;
      color: #4a5568;
      margin-top: 0;
      margin-bottom: 20px;
    }

    .section {
      margin-bottom: 24px;
      padding: 16px;
      border-left: 4px solid #2f6cff;
      background: #f7f9ff;
      border-radius: 10px;
    }

    .section h2 {
      margin-top: 0;
      font-size: 20px;
      color: #1f2a44;
    }

    .code {
      background: #1e293b;
      color: #e2e8f0;
      padding: 14px;
      border-radius: 10px;
      overflow-x: auto;
      font-family: Consolas, monospace;
      font-size: 14px;
      margin-top: 10px;
    }

    .note {
      margin-top: 12px;
      padding: 10px;
      background: #fff7d6;
      border: 1px solid #f6d365;
      border-radius: 8px;
    }

    .grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .card {
      padding: 14px;
      border-radius: 10px;
      background: #fff;
      border: 1px solid #e2e8f0;
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 16px;
      color: #0f1a33;
    }

    .card p {
      margin: 0;
      color: #4a5568;
    }

    @media (max-width: 700px) {
      .grid {
        grid-template-columns: 1fr;
      }
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

    <div class="container">
    <h1>Laravel Eloquent Cheat Sheet</h1>
    <p class="subtitle">isDirty / isClean / wasChanged / chunk / lazy / cursor</p>

    <div class="section">
      <h2>1) isDirty() vs isClean()</h2>
      <div class="code">
        $flight = Flight::find(1);<br>
        $flight->name = 'New name';<br>
        $flight->isDirty(); // true<br><br>

        $flight = Flight::find(1);<br>
        $flight->isClean(); // true
      </div>
      <div class="note">
        <b>Izoh:</b> <br>
        <b>isDirty()</b> – modelda saqlanmagan o‘zgarish borligini tekshiradi.<br>
        <b>isClean()</b> – modelda saqlanmagan o‘zgarish yo‘qligini tekshiradi.
      </div>
    </div>

    <div class="section">
      <h2>2) wasChanged()</h2>
      <div class="code">
        $user = User::create([<br>
        &nbsp;&nbsp;'first_name' => 'Taylor',<br>
        &nbsp;&nbsp;'last_name' => 'Otwell',<br>
        &nbsp;&nbsp;'title' => 'Developer',<br>
        ]);<br><br>

        $user->title = 'Painter';<br>
        $user->save();<br><br>

        $user->wasChanged(); // true<br>
        $user->wasChanged('title'); // true<br>
        $user->wasChanged('first_name'); // false
      </div>
      <div class="note">
        <b>Izoh:</b> <br>
        <b>wasChanged()</b> – oxirgi save() paytida qaysi field o‘zgarganini tekshiradi.
      </div>
    </div>

    <div class="section">
      <h2>3) chunk()</h2>
      <div class="code">
        Flight::chunk(200, function ($flights) {<br>
        &nbsp;&nbsp;foreach ($flights as $flight) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;// ...<br>
        &nbsp;&nbsp;}<br>
        });
      </div>
      <div class="note">
        <b>Izoh:</b> Katta jadvaldagi yozuvlarni bo‘lak-bo‘lak olib ishlash uchun.
      </div>
    </div>

    <div class="section">
      <h2>4) lazy()</h2>
      <div class="code">
        foreach (Flight::lazy() as $flight) {<br>
        &nbsp;&nbsp;// ...<br>
        }
      </div>
      <div class="note">
        <b>Izoh:</b> Katta datasetni bitta-bitta qayta ishlaydi (LazyCollection).
      </div>
    </div>

    <div class="grid">
      <div class="card">
        <h3>5) cursor()</h3>
        <p>
          foreach (Flight::where('destination','Zurich')->cursor() as $flight) {<br>
          &nbsp;&nbsp;// ...<br>
          }
        </p>
        <p style="margin-top: 10px;">
          <b>Izoh:</b> Eng kam RAM, lekin DB connection uzoq vaqt band bo‘ladi.
        </p>
      </div>

      <div class="card">
        <h3>6) refresh()</h3>
        <p>
          $flight = Flight::where('number','FR 900')->first();<br>
          $flight->number = 'FR 456';<br>
          $flight->refresh();<br>
          $flight->number; // FR 900
        </p>
      </div>
    </div>

    <div class="section">
      <h2>7) reject()</h2>
      <div class="code">
        $flights = Flight::where('destination', 'Paris')->get();<br>
        $flights = $flights->reject(function (Flight $flight) {<br>
        &nbsp;&nbsp;return $flight->cancelled;<br>
        });
      </div>
      <div class="note">
        <b>Izoh:</b> callback true bo‘lsa elementni olib tashlaydi.
      </div>
    </div>

    <div class="section">
      <h2>8) fresh()</h2>
      <div class="code">
        $flight = Flight::where('number', 'FR 900')->first();<br>
        $freshFlight = $flight->fresh();
      </div>
      <div class="note">
        <b>Izoh:</b> Bazadan yangi model obyektini qaytaradi (eng so‘nggi holat).
      </div>
    </div>

    <div class="section">
      <h2>Mini Cheat Sheet</h2>
      <div class="code">
        isDirty()  → save() dan oldin o‘zgarish borligini tekshiradi<br>
        isClean()  → save() dan oldin o‘zgarish yo‘qligini tekshiradi<br>
        wasChanged() → save() dan keyin o‘zgarish bo‘lganini tekshiradi<br>
        chunk()   → bo‘lak-bo‘lak o‘qish<br>
        lazy()    → bitta-bitta o‘qish (LazyCollection)<br>
        cursor()  → DB cursor orqali o‘qish<br>
        refresh() → modelni bazadan qayta yuklash<br>
        fresh()   → yangi model obyektini bazadan qayta yuklash
      </div>
    </div>
  </div>
    <footer>
        <p>© 2026 | Laravel 10 Soft Delete | Amirxon</p>
    </footer>
</div>

</body>
</html>
