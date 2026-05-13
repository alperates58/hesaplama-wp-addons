function hcSuccessRateHesapla() {
    const success = parseFloat(document.getElementById('hc-sr-success').value);
    const total = parseFloat(document.getElementById('hc-sr-total').value);

    if (isNaN(success) || isNaN(total) || total <= 0 || success < 0) {
        alert('Lütfen geçerli değerler girin (Toplam sayı 0\'dan büyük, başarı sayısı 0 veya daha fazla olmalıdır).');
        return;
    }

    const rate = (success / total) * 100;
    const failRate = 100 - rate;

    document.getElementById('hc-res-sr-val').innerText = '%' + rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-sr-fail').innerText = "Başarısızlık Oranı: %" + failRate.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-basari-orani-hesaplama-result').classList.add('visible');
}
