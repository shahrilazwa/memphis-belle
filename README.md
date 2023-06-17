# MyGPI
## Developer Team
1. Elisah Satim
2. Farid Iqbal bin Ibrahim
3. Roth Camdessus Anak Robert
4. Siti Aminah Hanum binti Che Kob
5. Mazri bin Abu Hassan

## Requirement
- PHP 8.1 and above
- Composer
- NodeJS 16.16.0 LTS
- MariaDB

## Developer Installation
1. Clone the project.
    ```
    git clone https://git.osdec.gov.my/mygpi/mygpi-enigma.git
    ```
2. Duplicate `.env.example` file and give the file name as `.env`.
    ```
    cp .env.example .env
    ```
3. Create a database name `mygpi-enigma` on your MySQL Server.

4. Update `.env` file with your local DB connection information.
    ```
    DB_DATABASE=mygpi-v2
    DB_USERNAME=root
    DB_PASSWORD=password
    ```

5. Download all composer library for this project.
    ```
    composer install
    ```

6. Generate unique key for your local copy of this project
    ```
    php artisan key:generate
    ```

7. Run database migration with basic data
    ```
    php artisan migrate:fresh --seed
    ```

## Create New View Page + Controller
1. Buat fail baharu untuk view dengan extension `.blade.php` di dalam folder `resources/views/pages`. Jika perlu, buat satu group folder untuk fungsi tersebut. Contoh:
    `resources/views/pages/pengurusan/agensi.blade.php`

    Contoh Rangka Halaman:
    ```
    @extends('../layout/' . $layout)

    @section('subhead')
        <title>Pengurusan Agensi</title>
    @endsection

    @section('subcontent')
    <h2 class="mt-10 text-lg font-medium intro-y">Pengurusan Agensi</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="flex flex-wrap items-center col-span-12 mt-2 intro-y sm:flex-nowrap">
        Kandungan
        </div>
    </div>
    @endsection
    ```

2. Buat controller baharu dengan memasukkan command dibawah. Controller baharu akan diwujudkan di dalam `app/Http/Controllers`.
    `php artisan make:controller NamaController`

3. Buat function untuk fungsi yang diinginkan di dalam fail controller yang ditambah. Contoh:
    ```
    class PengurusanAgensiController extends Controller
    {
        public function list()
        {
            return view(
                'pages/pengurusan/agensi', []
            );
        }
    }
    ```

4. Tambahkan route ke function tersebut di dalam fail `routes/web.php`. Contoh:
    ```
        Route::middleware('auth')->group(function() {
            Route::prefix('pengurusan')->group(function () {
                Route::get('agensi', 'PengurusanAgensiController@list')->name('pengurusan-agensi');
            });
        }
    ```

5. Jika perlu page tersebut ditambah ke Menu Navigasi sistem, tambahkan link di dalam fail `app/Main/SideMenu.php`. Contoh:
    ```
    ...
        'pengurusan' => [
            'icon' => 'settings',
            'title' => 'Pengurusan',
            'sub_menu' => [
                'agensi' => [
                    'title' => 'Agensi',
                    'route_name' => 'pengurusan-agensi',
                    'params' => [],
                ],
                ...
            ],
        ],
    ...
    ```

5. Kemaskini cache Laravel untuk mengemaskini route terkini:
    `php artisan route:cache`

6. Ujicuba route dan page melalui URL sistem di browser seperti path dibuat route. Contoh:
    `http://localhost:8000/pengurusan/agensi