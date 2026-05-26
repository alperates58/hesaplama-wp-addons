function hcBagajHesapla() {
    var bilet = parseFloat(document.getElementById('hc-bsa-bilet').value) || 0;
    var fiili = parseFloat(document.getElementById('hc-bsa-fiili').value) || 0;
    var ucret = parseFloat(document.getElementById('hc-bsa-ucret').value) || 0;
    var para = document.getElementById('hc-bsa-para').value;

    var asim = fiili - bilet;
    if (asim <= 0) {
        document.getElementById('hc-bsa-res-miktar').innerText = 'Limit aşılmadı';
        document.getElementById('hc-bsa-res-ceza').innerText = '0.00 ' + para;
        document.getElementById('hc-bsa-res-not').innerText = 'Bagaj hakkınız uçuş kuralları limitleri dahilindedir.';
        document.getElementById('hc-bsa-result').classList.add('visible');
        return;
    }

    var ceza = asim * ucret;
    var not = 'Havalimanında ödemek yerine uçuş öncesi online sistem üzerinden ek bagaj hakkı satın almak genellikle %50 daha avantajlıdır.';

    document.getElementById('hc-bsa-res-miktar').innerText = asim.toFixed(1) + ' kg';
    document.getElementById('hc-bsa-res-ceza').innerText = ceza.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' ' + para;
    document.getElementById('hc-bsa-res-ceza').style.color = '#ef4444';
    document.getElementById('hc-bsa-res-not').innerText = not;

    document.getElementById('hc-bsa-result').classList.add('visible');
}