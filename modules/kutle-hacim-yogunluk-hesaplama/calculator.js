function hcMvdFindChange() {
    const find = document.getElementById('hc-mvd-find').value;
    
    document.getElementById('hc-mvd-rho-group').style.display = find === 'rho' ? 'none' : 'block';
    document.getElementById('hc-mvd-m-group').style.display = find === 'm' ? 'none' : 'block';
    document.getElementById('hc-mvd-v-group').style.display = find === 'V' ? 'none' : 'block';
}

function hcKütleHacimYoğunlukHesapla() {
    const find = document.getElementById('hc-mvd-find').value;
    
    let rho = parseFloat(document.getElementById('hc-mvd-rho').value);
    let m = parseFloat(document.getElementById('hc-mvd-m').value);
    let v = parseFloat(document.getElementById('hc-mvd-v').value);

    let resultVal = 0;
    let resultLabel = '';

    if (find === 'rho') {
        if (isNaN(m) || isNaN(v) || v <= 0 || m <= 0) {
            alert('Lütfen geçerli ve pozitif kütle ve hacim değerleri giriniz.');
            return;
        }
        resultVal = m / v;
        resultLabel = 'Hesaplanan Yoğunluk (&rho;):';
        document.getElementById('hc-mvd-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/m³';
    } else if (find === 'm') {
        if (isNaN(rho) || isNaN(v) || rho <= 0 || v <= 0) {
            alert('Lütfen geçerli ve pozitif yoğunluk ve hacim değerleri giriniz.');
            return;
        }
        resultVal = rho * v;
        resultLabel = 'Hesaplanan Kütle (m):';
        document.getElementById('hc-mvd-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg';
    } else if (find === 'V') {
        if (isNaN(m) || isNaN(rho) || rho <= 0 || m <= 0) {
            alert('Lütfen geçerli ve pozitif kütle ve yoğunluk değerleri giriniz.');
            return;
        }
        resultVal = m / rho;
        resultLabel = 'Hesaplanan Hacim (V):';
        document.getElementById('hc-mvd-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' m³';
    }

    document.getElementById('hc-mvd-result-label').innerText = resultLabel;
    document.getElementById('hc-kutle-hacim-yogunluk-result').classList.add('visible');
}
