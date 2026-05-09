function hcRandomNumHesapla() {
    const min = parseInt(document.getElementById('hc-rnd-min').value) || 0;
    const max = parseInt(document.getElementById('hc-rnd-max').value) || 100;
    const count = parseInt(document.getElementById('hc-rnd-count').value) || 1;

    if (min >= max) {
        alert('Maksimum değer minimumdan büyük olmalıdır.');
        return;
    }

    const container = document.getElementById('hc-res-rnd-list');
    container.innerHTML = '';

    for (let i = 0; i < count; i++) {
        const rnd = Math.floor(Math.random() * (max - min + 1)) + min;
        const chip = document.createElement('div');
        chip.className = 'hc-rnd-chip';
        chip.innerText = rnd;
        container.appendChild(chip);
    }

    document.getElementById('hc-random-num-result').classList.add('visible');
}
