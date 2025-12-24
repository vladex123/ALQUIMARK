<footer class="bg-dark text-light mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-3">
                <h5>Alquimarket</h5>
                <p>Tu plataforma de alquiler confiable</p>
            </div>
            <div class="col-md-3">
                <h5>Enlaces rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light">Inicio</a></li>
                    <li><a href="{{ route('categories') }}" class="text-light">Categorías</a></li>
                    <li><a href="{{ route('about') }}" class="text-light">Sobre nosotros</a></li>
                    <li><a href="{{ route('contact') }}" class="text-light">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Legales</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('terms') }}" class="text-light">Términos y condiciones</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-light">Política de privacidad</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Síguenos</h5>
                <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="bg-secondary py-2">
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} Alquimarket. Todos los derechos reservados.</small>
        </div>
    </div>
</footer>