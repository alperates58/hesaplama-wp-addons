function hcDebiMetotDegistir() {
    const metot = document.getElementById('hc-debi-metot').value;
    document.getElementById('hc-debi-hacim-grup').style.display = metot === 'hacim' ? 'block' : 'none';
    document.getElementById('hc-debi-hiz-grup').style.display = metot === 'hiz' ? 'block' : 'none';
}

function hcDebiHesapla() {
    const metot = document.getElementById('hc-debi-metot').value;
    let Q = 0;

    if (metot === 'hacim') {
        const V = parseFloat(document.getElementById('hc-debi-v').value);
        const t = parseFloat(document.getElementById('hc-debi-t').value);
        if (isNaN(V) || isNaN(t) || t <= 0) {
            alert('Lütfen geçerli değerler girin.');
            return;
        }
        Q = V / t;
    } else {
        const A = parseFloat(document.getElementById('hc-debi-a').value);
        const v = parseFloat(document.getElementById('hc-debi-vhiz').value);
        if (isNaN(A) || isNaN(v)) {
            alert('Lütfen geçerli değerler girin.');
            return;
        }
        Q = A * v;
    }

    document.getElementById('hc-debi-res-m3s').innerText = Q.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' m³/sn';
    document.getElementById('hc-debi-res-ls').innerText = (Q * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' L/sn';
    document.getElementById('hc-debi-res-m3h').innerText = (Q * 3600).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³/saat';
    
    document.getElementById('hc-debi-result').classList.add('visible');
}
