function hcAtomHesapla() {
    const z = parseInt(document.getElementById('hc-atom-z').value);
    const a = parseInt(document.getElementById('hc-atom-a').value);
    const q = parseInt(document.getElementById('hc-atom-q').value) || 0;

    if (isNaN(z) || isNaN(a) || z <= 0 || a <= 0) {
        alert('Lütfen geçerli Atom ve Kütle numaraları giriniz.');
        return;
    }

    if (z > a) {
        alert('Kütle numarası (A), atom numarasından (Z) küçük olamaz.');
        return;
    }

    const protons = z;
    const neutrons = a - z;
    const electrons = z - q;

    if (electrons < 0) {
        alert('Bu iyon yükü fiziksel olarak mümkün değil (elektron sayısı negatif olamaz).');
        return;
    }

    document.getElementById('hc-res-p').innerText = protons;
    document.getElementById('hc-res-n').innerText = neutrons;
    document.getElementById('hc-res-e').innerText = electrons;

    document.getElementById('hc-viz-a').innerText = a;
    document.getElementById('hc-viz-z').innerText = z;
    document.getElementById('hc-viz-q').innerText = q === 0 ? '' : (q > 0 ? '+' + q : q);

    document.getElementById('hc-atom-result').classList.add('visible');
    document.getElementById('hc-atom-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
