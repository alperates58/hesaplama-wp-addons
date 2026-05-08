function hcFAVOKMarjiHesapla() {
    const ebitda = parseFloat(document.getElementById('hc-em-ebitda').value) || 0;
    const revenue = parseFloat(document.getElementById('hc-em-revenue').value) || 0;

    if (revenue === 0) {
        alert('Satış tutarı sıfır olamaz.');
        return;
    }

    const margin = (ebitda / revenue) * 100;

    document.getElementById('hc-em-res-val').innerText = '%' + margin.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-ebitda-margin-result').classList.add('visible');
}
