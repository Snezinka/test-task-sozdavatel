<?php
    $tittle = "Photo Gallery";
    require "blocks/header.php";
?>

<div class="w-[1200px] pb-5">
    <div class="mt-12 ml-12 flex justify-between">
        <form class="w-[400px]" action="upload.php" method="post" enctype="multipart/form-data">
            <h1 class="max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-5xl dark:text-white">Фотогаларея</h1>
            <?php if(isset($_SESSION['success'])):?>
                <div class=" mx-auto p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <?php echo $_SESSION['success'];?>
                    <?php unset($_SESSION['success']);?>
                </div>
            <?php endif;?>

            <?php if(isset($_SESSION['error'])):?>
                <div class=" mx-auto p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <?php echo $_SESSION['error'];?>
                    <?php unset($_SESSION['error']);?>
                </div>
            <?php endif;?>

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Загрузить фото</label>
            <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Поддерживаются изображения только в форматах JPG и PNG</div>
            <button class="block p-4 text-lg bg-black hover:bg-gray-700 transition-all text-white rounded-lg w-full mt-8">Загрузить</button>
        </form>

        <div class="w-[600px] grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php
            $image_path = "Gallery";
            $images = glob($image_path . '/*');
            foreach($images as $file):?>
                <div>
                    <div><image src="<?php echo $file;  ?>"></div>
                </div>
            <?php endforeach;?>
        </div>
    </div>

<?php
    require "blocks/footer.php";
?>
