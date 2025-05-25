// Funcionalidad para la barra de progreso
document.addEventListener('DOMContentLoaded', function() {
    // Aplicar colores según el porcentaje
    const progressBars = document.querySelectorAll('.progress-bar');
    
    progressBars.forEach(bar => {
        const percent = parseInt(bar.getAttribute('data-percent'));
        
        // Cambiar color según el porcentaje
        if (percent < 25) {
            bar.classList.remove('from-blue-500', 'to-blue-600');
            bar.classList.add('from-red-500', 'to-red-600');
        } else if (percent < 50) {
            bar.classList.remove('from-blue-500', 'to-blue-600');
            bar.classList.add('from-orange-500', 'to-orange-600');
        } else if (percent < 75) {
            bar.classList.remove('from-blue-500', 'to-blue-600');
            bar.classList.add('from-yellow-500', 'to-yellow-600');
        } else {
            bar.classList.remove('from-blue-500', 'to-blue-600');
            bar.classList.add('from-green-500', 'to-green-600');
        }
        
        // Efecto de animación al cargar
        setTimeout(() => {
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = percent + '%';
            }, 100);
        }, 0);
    });
});