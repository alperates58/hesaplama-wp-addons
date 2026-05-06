function hcAerosolIticiGazOraniHesapla() {
    var toplamAgirlik = parseFloat(document.getElementById('hc-aerosol-toplam-agirlik').value);
    var gazOrani = parseFloat(document.getElementById('hc-aerosol-gaz-orani').value);

    if (isNaN(toplamAgirlik) || isNaN(gazOrani) || toplamAgirlik <= 0 || gazOrani < 0 || gazOrani > 100) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun (Gaz oranı 0-100 arasında olmalıdır).');
        return;
    }

    var gazMiktari = toplamAgirlik * (gazOrani / 100);
    var konsantreMiktari = toplamAgirlik - gazMiktari;

    var resultHtml = '<div class="hc-result-value">İtici Gaz: ' + gazMiktari.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' kg</div>';
    resultHtml += '<div class="hc-result-value">Konsantre (Ürün): ' + konsantreMiktari.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' kg</div>';

    document.getElementById('hc-aerosol-result-text').innerHTML = resultHtml;
    document.getElementById('hc-aerosol-result').classList.add('visible');
}
