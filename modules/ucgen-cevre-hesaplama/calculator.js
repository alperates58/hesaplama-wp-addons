function hcTriPeriHesapla() {
    const a = parseFloat(document.getElementById('hc-tp-a').value);
    const b = parseFloat(document.getElementById('hc-tp-b').value);
    const c = parseFloat(document.getElementById('hc-tp-c').value);

    if (isNaN(a) || isNaN(b) || isNaN(c) || a <= 0 || b <= 0 || c <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Check triangle inequality
    if (a + b <= c || a + c <= b || b + c <= a) {
        alert('Bu kenar uzunlukları ile bir üçgen oluşturulamaz.');
        return;
    }

    const peri = a + b + c;

    document.getElementById('hc-tp-res-val').innerText = peri.toLocaleString('tr-TR');
    document.getElementById('hc-ucgen-cevre-result').classList.add('visible');
}
