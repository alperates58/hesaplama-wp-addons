function hcDNAKonsHesapla() {
    const a260 = parseFloat(document.getElementById('hc-dna-a260').value);
    const df = parseFloat(document.getElementById('hc-dna-df').value);
    const factor = parseFloat(document.getElementById('hc-dna-type').value);

    if (isNaN(a260) || isNaN(df) || a260 < 0 || df <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const conc = a260 * factor * df;

    document.getElementById('hc-dna-conc-val').innerText = conc.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' µg/mL';
    document.getElementById('hc-dna-conc-note').innerText = `Hesaplama ${factor} µg/mL/A₂₆₀ katsayısı ve ${df} seyreltme faktörü kullanılarak yapılmıştır.`;
    document.getElementById('hc-dna-conc-result').classList.add('visible');
}
