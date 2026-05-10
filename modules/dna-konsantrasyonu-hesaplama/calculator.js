function hcDnaConcHesapla() {
    const a260 = parseFloat(document.getElementById('hc-dc-a260').value);
    const df = parseFloat(document.getElementById('hc-dc-df').value || 1);
    const factor = parseFloat(document.getElementById('hc-dc-type').value);

    if (isNaN(a260)) {
        alert('Lütfen A260 absorbans değerini giriniz.');
        return;
    }

    // Konsantrasyon = A260 * Faktör * Seyreltme Faktörü
    const conc = a260 * factor * df;

    const resVal = document.getElementById('hc-dc-res-val');
    resVal.innerText = conc.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-dna-conc-result').classList.add('visible');
}
