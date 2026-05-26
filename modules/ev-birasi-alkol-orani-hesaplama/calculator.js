function hcBiraAbvHesapla() {
    var og = parseFloat(document.getElementById('hc-eba-og').value) || 0;
    var fg = parseFloat(document.getElementById('hc-eba-fg').value) || 0;

    if (og <= fg) {
        alert('İlk yoğunluk (OG) değeri son yoğunluk (FG) değerinden büyük olmalıdır.');
        return;
    }

    // Standart Alkol Formülü: ABV = (OG - FG) * 131.25
    var abv = (og - fg) * 131.25;

    // Sindirim Oranı (Yüzde olarak ne kadar şeker mayaya dönüştü)
    var atten = ((og - fg) / (og - 1)) * 100;

    // Kalori formülü (kabaca)
    var kalori = ((76.08 * (og - fg) / (1.775 - og)) + (355 * (fg - 1))) * 3.3; // 330 ml bazında

    document.getElementById('hc-eba-res-abv').innerText = '%' + abv.toFixed(2);
    document.getElementById('hc-eba-res-atten').innerText = '%' + atten.toFixed(1);
    document.getElementById('hc-eba-res-kalori').innerText = Math.round(kalori) + ' kcal';

    document.getElementById('hc-eba-result').classList.add('visible');
}