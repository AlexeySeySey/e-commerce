<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        //Важно - прикрути локаль и смне улокали в шапку
        //И ыенси стили из штмл в цсс отдельный

        //Пусть при наведении на ссылку в админке - выезжает чуть-чуть влево надпись
        //После организации наслежования макетов сделай переходы по секциям через аякс (то что меняется - меняется аяксом).

        //У товаров есть количество на складе, это тоже нужно в товарах контролировать.


         if ($request->hasFile('categories_image')) {
             if ($request->categories_image->isValid()) {
                 $filename = $request->file('categories_image')->getClientOriginalName();
                 $request->file('categories_image')->storeAs('public/upload_categories','category_name.jpg');
             }
         } else {
             return redirect()->back()->with('upload_error','Error');
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
}
