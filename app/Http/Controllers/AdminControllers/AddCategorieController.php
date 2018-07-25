<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Categories;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;

class AddCategorieController extends Controller
{

    public function add(Request $request)
    {
        //В конце сообщение об успехе заанимируй(сверху выплывает зеленый кружочек с жирной
        // темно-зеленой галочкой (справа) и пропадает через 3 сек.)

        //Клади в таблицу категорий
        //И локаль пусть укажет из селека на какой язык переводит и сам перевод напишет, локаль вставишь в пути
        //И добавь изображение
        //Задавай ширину и высоту изображению (по стандарту для верхнего, это админ не ставит)
        //Изображение Категории отображай из папки upload_categories
        //И там лежат изображения с именами - как категории (Household.jpeg и т.д.)
        //Возьми верстку и график по юзерам из старого сайта.
        //Пропиши переводы и разбей главный макет админки на секции.
        //Все изображение категорий должны храниться в одной и той же папки, то есть путь поставь в ту папку куда идет аплоад

        /*Имя
        *
         *Картинка (показывай картинку уже с заданными параметрами, также как будет растянуто
         * и в результате и с надписью которая пишеться через v-model втоматом)
         *
         *Перевод имени на остальные 2 языка.
         * */

        //ВАЖНО - при добавлении категории запись идет в те файлы, которые != локализации админа.
        // Бери локаль и заполняй файлы через свич кейс.
        // Указывай локализацию на странице добавления категории и ссылку на смену в настройках.


        if ($request->hasFile('categories_image')) {
            if ($request->categories_image->isValid()) {
                $filename = $request->file('categories_image')->getClientOriginalName();
                $request->file('categories_image')->storeAs('public/upload_categories', 'category_name.jpg');
            }
        } else {
            return redirect()->back()->with('upload_error', 'Error');
        }

        return 1;
        if (! is_string($request->name)) {
            abort(500);
        }

        if (! is_string($request->tranc)) {
            abort(500);
        }

        $b = ["'$request->name'", "'$request->tranc'"];

        $file = base_path().'/resources/lang/'.$request->locale.'/validation.php';

        /*
                $categorie = new Categories;
                $categorie->image =
                $categorie->name =
                $categorie->save();
        */

        if (! file_exists($file)) {
            abort(500);
        }
        $array_file = file($file);

        $array_file[25] .= "\r".(implode('=>', $b).','."\n");
        file_put_contents($file, $array_file);

        return 1;
        //return 'seccues - покажи в алерте что добавлено то-то и так-то и все ок, анимацией,
        // справа свехру квадрат выплывает закругленный, и то же самое если что-то пошло не так';
    }


    public function update(Request $request)
    {
        /*
         *
         * Если же подъехало изображение (или не только имя, но и изображение), тогда нужно найти
         * сатрое изображение (по связи через отноешние -изображение--категория- (один к одному), чтобы
         * нужное изображение было уникальным, достанем его по имени и удалим из директории, в которой
         * старая картиинка хранилась. Далее положить в эту директорию новую картиу.
         *
         *
         * ВАЖНО - Для того чтобы хранить уникальное имя для изображение, чтобы избежать путаницы,
         *         при сохранении изображения прописывай ему не только расширение, но и привязывай
         *         переданный айди категории к нему в названии.
         *
         * Нужно же перевод подогнать под имя категории. Возьми из добавления новой.
         *
         * Привяжи к категориям, чтобы на сайте отображалась картинка также
         *
         * Нужно кеш чистить чтобы картинка сразу изображалась
         *
         * */

        if ($request->name != null) {
            $name = $request->validate(['name' => 'regex:/^[a-zA-Z ]+$/']);
            $name = $name['name'];
        } else {
            $name = null;
        }

        if ((!($request->hasFile('new_categories_image'))) and ($request->name == null)) {
            abort(500, 'You forget to input data!');
        }

        $current_category_id = intval($request->current_category_id);

        if ($request->hasFile('new_categories_image')) {
            if ($request->new_categories_image->isValid()) {
                $filename = $request->file('new_categories_image')->getClientOriginalName();
                if ($name == null) {
                    $image_store_name = 'category'.$current_category_id.'_name.jpg';
                    Storage::disk('public')->put($image_store_name, file_get_contents($request->file('new_categories_image')));
                } else {
                    $image_store_name = $name.$current_category_id.'_name.jpg';

                    Storage::disk('public')->put($image_store_name, file_get_contents($request->file('new_categories_image')));
                }
            }
        } else {
            abort(500, 'Oops! something wrong with your file!');
        }

        $categorie = Categories::find($current_category_id);
        if ($name != null) {
            $categorie->name = $name;
        }
        $categorie->image = $image_store_name;
        $categorie->save();


        if(file_exists($request->old_category_image_name)){
            @unlink('public/images/upload_cat/.'.$request->old_category_image_name);
        }

        return redirect()->back();
    }

}
