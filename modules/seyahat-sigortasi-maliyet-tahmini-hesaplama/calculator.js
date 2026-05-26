function hcSigortaMaliyetHesapla() {
    var kapsam = parseFloat(document.getElementById('hc-ssm-kapsam').value) || 1.0;
    var yas = parseFloat(document.getElementById('hc-ssm-yas').value) || 1.0;
    var gun = parseInt(document.getElementById('hc-ssm-gun').value) || 7;

    // Günlük standart baz ücret 1.2 Euro
    var bazUcret = 1.2;
    var toplamEur = bazUcret * gun * kapsam * yas;
    
    // Minimum poliçe basım ücreti 8 Euro'dur
    if (toplamEur < 8.0) toplamEur = 8.0;

    // Euro kuru ~ 53.4
    var eurKur = 53.4;
    var toplamTl = toplamEur * eurKur;

    document.getElementById('hc-ssm-res-doviz').innerText = toplamEur.toFixed(2) + ' €';
    document.getElementById('hc-ssm-res-tl').innerText = toplamTl.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';

    document.getElementById('hc-ssm-result').classList.add('visible');
}