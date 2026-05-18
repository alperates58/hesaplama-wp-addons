function hcN2FindChange() {
    const find = document.getElementById('hc-n2-find').value;
    document.getElementById('hc-n2-f-group').style.display = find === 'F' ? 'none' : 'block';
    document.getElementById('hc-n2-a-group').style.display = find === 'a' ? 'none' : 'block';
    document.getElementById('hc-n2-m-group').style.display = find === 'm' ? 'none' : 'block';
}

function hcNewtonUnIkinciYasasıHesapla() {
    const find = document.getElementById('hc-n2-find').value;
    const mu = parseFloat(document.getElementById('hc-n2-friction').value) || 0;
    const g = 9.80665; // Yerçekimi ivmesi

    let f = parseFloat(document.getElementById('hc-n2-f').value);
    let m = parseFloat(document.getElementById('hc-n2-m').value);
    let a = parseFloat(document.getElementById('hc-n2-a').value);

    if (mu < 0 || mu > 1) {
        alert('Sürtünme katsayısı 0 ile 1 arasında olmalıdır.');
        return;
    }

    let resultVal = 0;
    let labelText = '';
    let fSurtunme = 0;
    let fNet = 0;

    if (find === 'F') {
        if (isNaN(m) || isNaN(a) || m <= 0) {
            alert('Lütfen geçerli kütle (pozitif) ve ivme giriniz.');
            return;
        }
        // F_net = m * a
        // F_uygulanan = F_net + f_surtunme
        fSurtunme = mu * m * g;
        fNet = m * a;
        f = fNet + fSurtunme;
        
        resultVal = f;
        labelText = 'Uygulanması Gereken Net Kuvvet (F):';
        document.getElementById('hc-n2-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    } else if (find === 'a') {
        if (isNaN(f) || isNaN(m) || m <= 0) {
            alert('Lütfen geçerli kuvvet ve kütle (pozitif) değerleri giriniz.');
            return;
        }
        // a = F_net / m
        // F_net = F_uygulanan - f_surtunme
        fSurtunme = mu * m * g;
        fNet = f - fSurtunme;

        if (fNet < 0) {
            a = 0; // Sürtünme kuvveti itme kuvvetinden büyük olamaz, cisim hareket etmez
            fNet = 0;
            fSurtunme = f; // Statik sürtünme uygulanan kuvvete eşittir
        } else {
            a = fNet / m;
        }

        resultVal = a;
        labelText = 'Oluşan İvme (a):';
        document.getElementById('hc-n2-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m/s²';
    } else if (find === 'm') {
        if (isNaN(f) || isNaN(a) || a <= 0) {
            alert('Lütfen geçerli kuvvet ve ivme (pozitif) değerleri giriniz.');
            return;
        }
        // m = F_uygulanan / (a + mu * g)
        m = f / (a + mu * g);
        fSurtunme = mu * m * g;
        fNet = m * a;

        resultVal = m;
        labelText = 'Cismin Kütlesi (m):';
        document.getElementById('hc-n2-val').innerText = resultVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    }

    document.getElementById('hc-n2-result-label').innerText = labelText;
    document.getElementById('hc-n2-fs-val').innerText = fSurtunme.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-n2-fnet-val').innerText = fNet.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';

    document.getElementById('hc-newton-un-ikinci-yasasi-result').classList.add('visible');
}
