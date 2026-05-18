function hcFmaFindChange() {
    const find = document.getElementById('hc-fma-find').value;
    
    document.getElementById('hc-fma-f-group').style.display = find === 'F' ? 'none' : 'block';
    document.getElementById('hc-fma-m-group').style.display = find === 'm' ? 'none' : 'block';
    document.getElementById('hc-fma-a-group').style.display = find === 'a' ? 'none' : 'block';
}

function hcKuvvetKütleİvmeHesapla() {
    const find = document.getElementById('hc-fma-find').value;
    
    let f = parseFloat(document.getElementById('hc-fma-f').value);
    let m = parseFloat(document.getElementById('hc-fma-m').value);
    let a = parseFloat(document.getElementById('hc-fma-a').value);

    let resultVal = 0;
    let resultLabel = '';

    if (find === 'F') {
        if (isNaN(m) || isNaN(a) || m <= 0) {
            alert('Lütfen geçerli kütle ve ivme değerleri giriniz.');
            return;
        }
        resultVal = m * a;
        resultLabel = 'Hesaplanan Kuvvet (F):';
        document.getElementById('hc-fma-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' N';
    } else if (find === 'm') {
        if (isNaN(f) || isNaN(a) || a === 0) {
            alert('Lütfen geçerli kuvvet ve ivme (sıfırdan farklı) değerleri giriniz.');
            return;
        }
        resultVal = f / a;
        resultLabel = 'Hesaplanan Kütle (m):';
        document.getElementById('hc-fma-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg';
    } else if (find === 'a') {
        if (isNaN(f) || isNaN(m) || m <= 0) {
            alert('Lütfen geçerli kuvvet ve pozitif kütle değerleri giriniz.');
            return;
        }
        resultVal = f / m;
        resultLabel = 'Hesaplanan İvme (a):';
        document.getElementById('hc-fma-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m/s²';
    }

    document.getElementById('hc-fma-result-label').innerText = resultLabel;
    document.getElementById('hc-kuvvet-kutle-ivme-result').classList.add('visible');
}
