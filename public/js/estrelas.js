function generateStars(containerId, size, nota) {
    const rating = parseFloat(nota);

    if (isNaN(rating) || rating < 0 || rating > 5.0) {
        alert('Para as notas, por favor, insira um número entre 1.0 e 5.0');
        return;
    }

    const starsContainer = document.getElementById(containerId);
    starsContainer.innerHTML = '';

    const fullStars = Math.floor(rating);
    const partialStar = rating % 1;
    let partialPercentage = 0;

    if (partialStar <= 1/3)
        partialPercentage = 37;

    if (partialStar > 1/3 && partialStar <= 2/3)
        partialPercentage = 50;

    if (partialStar > 2/3)
        partialPercentage = 65;

    for (let i = 1; i <= 5; i++) {
        const star = document.createElement('div');
        star.classList.add('star');
        
        if (i <= fullStars) {
            star.style.backgroundColor = 'gold';
            starsContainer.style.setProperty('--star-size', `${size}px`);
        }
        else if (i === fullStars + 1 && partialStar !== 0) {
            star.classList.add('partial');
            starsContainer.style.setProperty('--star-size', `${size}px`);
            star.style.setProperty('--clip-percentage', `${partialPercentage}%`);
        } else {
            starsContainer.style.setProperty('--star-size', `${size}px`);
            star.style.backgroundColor = 'gray';
        }
        starsContainer.appendChild(star);
    }
}
