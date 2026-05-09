function hcWeddingDrinkHesapla() {
    const people = parseInt(document.getElementById('hc-wd-people').value) || 0;
    const type = document.getElementById('hc-wd-type').value;

    const water = people * 0.75; // Kişi başı 0.75L
    const soda = people * 0.6;  // Kişi başı 0.6L

    let beer = 0;
    let wine = 0;

    if (type !== 'none') {
        beer = people * 1.5; // Ortalama kişi başı 1.5 bira
        wine = people / 3;   // Her 3 kişiye 1 şişe şarap
        if (type === 'full') {
            beer = people * 2;
            wine = people / 2.5;
        }
    }

    document.getElementById('hc-res-wd-water').innerText = Math.round(water) + ' Litre';
    document.getElementById('hc-res-wd-soda').innerText = Math.round(soda) + ' Litre';
    document.getElementById('hc-res-wd-beer').innerText = Math.round(beer) + ' Adet';
    document.getElementById('hc-res-wd-wine').innerText = Math.round(wine) + ' Şişe';
    
    document.getElementById('hc-wedding-drink-result').classList.add('visible');
}
