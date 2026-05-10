function hcRnaConcHesapla() {
    const a260 = parseFloat(document.getElementById('hc-rc-a260').value);
    const df = parseFloat(document.getElementById('hc-rc-df').value || 1);
    const factor = 40; // RNA extinction coefficient factor

    if (isNaN(a260)) {
        alert('Lütfen A260 absorbans değerini giriniz.');
        return;
    }

    const conc = a260 * factor * df;

    const resVal = document.getElementById('hc-rc-res-val');
    resVal.innerText = conc.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-rna-conc-result').classList.add('visible');
}
