<footer class="footer relative pt-1">
    <div class="container mx-auto px-6">
        <div class="sm:flex sm:mt-8 col-lg-10 offset-lg-1">
            <div class="mt-8 sm:mt-0 sm:w-full sm:px-8 flex flex-col md:flex-row justify-between">
                <div class="flex flex-col ">
                    <span class="font-bold text-gray-200 uppercase mt-4 md:mt-0 mb-2">Liens utiles</span>
                    <span class="my-2"><a href="{{route('acceuil.index')}}" class="text-md">Accueil</a></span>
                    <span class="my-2"><a href="{{route('presentation.index')}}" class="text-md ">Présentation</a></span>
                    <span class="my-2"><a href="{{route('contact.index')}}" class="text-md ">Contact</a></span>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-gray-200 uppercase mt-4 md:mt-0 mb-2">Nos réseaux sociaux</span>
                    <span class="my-2"><i style="color: white;" class="fab fa-facebook"></i>  <a class="text-md ">Facebook</a></span>
                    <span class="my-2"><i style="color: white;" class="fab fa-instagram"></i>  <a class="text-md ">Instagram</a></span>
                    <span class="my-2"><i style="color: white;" class="fab fa-twitter"></i>  <a class="text-md ">Twitter</a></span>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-gray-200 uppercase mt-4 md:mt-0 mb-2">Nous trouver</span>
                    <span class="my-2"><a class="text-md float-right">Bâtiment Les Passerelles, 24 Avenue Joannès Masset, 69009 Lyon</a></span>
                    <span class="my-2"><a href="tel:+33484250128" class="text-md">04 84 25 01 28</a></span>
                    <span class="my-2"><a href="mailto:eco.service.institut.g4@gmail.com" class="text-md hover:text-white">eco.service.institut.g4@gmail.com</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-6">
        <div class="mt-16 border-t-2 border-gray-300 col-lg-10 offset-lg-1 flex flex-col items-center">
            <div class="sm:w-2/3 text-center py-6">
                <p class="text-sm text-white font-bold mb-2">
                    &copy; Éco Services 2020 - <?php echo date("Y"); ?>
                </p>
            </div>
        </div>
    </div>
</footer>
