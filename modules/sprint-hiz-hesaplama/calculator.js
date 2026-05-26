function hcSprintHesapla() {
    var s1 = parseFloat(document.getElementById('hc-sph-s1').value) || 0;
    var s2 = parseFloat(document.getElementById('hc-sph-s2').value) || 0;
    var s3 = parseFloat(document.getElementById('hc-sph-s3').value) || 0;
    var backlog = parseFloat(document.getElementById('hc-sph-backlog').value) || 0;

    var avg = (s1 + s2 + s3) / 3;
    if (avg <= 0) {
        alert('Lütfen tamamlanan sprint değerlerini giriniz.');
        return;
    }

    var sprintSayisi = Math.ceil(backlog / avg);

    // Öngörülebilirlik standardı sapma analizi
    var maxVal = Math.max(s1, s2, s3);
    var minVal = Math.min(s1, s2, s3);
    var sapma = (maxVal - minVal) / avg * 100;
    var predictability = 100 - sapma;
    if (predictability < 0) predictability = 10;
    if (predictability > 100) predictability = 100;

    document.getElementById('hc-sph-res-hiz').innerText = Math.round(avg) + ' SP / Sprint';
    document.getElementById('hc-sph-res-sayi').innerText = sprintSayisi + ' Sprint';
    document.getElementById('hc-sph-res-ongoru').innerText = '%' + Math.round(predictability);

    document.getElementById('hc-sph-result').classList.add('visible');
}