function hcPizzaPPHesapla() {
    const count = parseInt(document.getElementById('hc-pizza-count').value);
    const ppPerPizza = parseFloat(document.getElementById('hc-pizza-size').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // 3/8 kuralı: Kişi başı yaklaşık 3 dilim (8 dilimli pizzadan)
    const totalPizzas = count / ppPerPizza;

    document.getElementById('hc-pizza-val').innerText = Math.ceil(totalPizzas) + ' Adet';
    document.getElementById('hc-pizza-info').innerText = `Toplam yaklaşık ${count * 3} dilim üzerinden hesaplanmıştır.`;
    
    document.getElementById('hc-pizza-pp-result').classList.add('visible');
}
