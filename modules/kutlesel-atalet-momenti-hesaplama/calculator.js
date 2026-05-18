function hcInertiaGeomChange() {
    const geom = document.getElementById('hc-inertia-geom').value;
    const label = document.getElementById('hc-inertia-dim-label');
    
    if (geom.startsWith('rod-')) {
        label.innerText = 'Çubuk Uzunluğu (L - metre)';
    } else {
        label.innerText = 'Yarıçap (r - metre)';
    }
}

function hcKütleselAtaletMomentiHesapla() {
    const geom = document.getElementById('hc-inertia-geom').value;
    const mass = parseFloat(document.getElementById('hc-inertia-mass').value);
    const dim = parseFloat(document.getElementById('hc-inertia-dim').value);

    if (isNaN(mass) || isNaN(dim) || mass <= 0 || dim <= 0) {
        alert('Lütfen geçerli ve pozitif kütle ve boyut (yarıçap/uzunluk) değerleri giriniz.');
        return;
    }

    let inertia = 0;
    let desc = '';

    if (geom === 'solid-sphere') {
        inertia = 0.4 * mass * Math.pow(dim, 2);
        desc = 'Formül: I = 2/5 &times; m &times; r² (Dolu Küre)';
    } else if (geom === 'hollow-sphere') {
        inertia = (2 / 3) * mass * Math.pow(dim, 2);
        desc = 'Formül: I = 2/3 &times; m &times; r² (İçi Boş Küre)';
    } else if (geom === 'solid-cylinder') {
        inertia = 0.5 * mass * Math.pow(dim, 2);
        desc = 'Formül: I = 1/2 &times; m &times; r² (Dolu Silindir / Disk)';
    } else if (geom === 'thin-hollow-cylinder') {
        inertia = mass * Math.pow(dim, 2);
        desc = 'Formül: I = m &times; r² (İnce Çeperli Boru)';
    } else if (geom === 'rod-center') {
        inertia = (1 / 12) * mass * Math.pow(dim, 2);
        desc = 'Formül: I = 1/12 &times; m &times; L² (Merkezden Dönen İnce Çubuk)';
    } else if (geom === 'rod-end') {
        inertia = (1 / 3) * mass * Math.pow(dim, 2);
        desc = 'Formül: I = 1/3 &times; m &times; L² (Uçtan Dönen İnce Çubuk)';
    }

    document.getElementById('hc-inertia-val').innerText = inertia.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' kg·m²';
    document.getElementById('hc-inertia-formula-desc').innerHTML = desc;
    document.getElementById('hc-kutlesel-atalet-momenti-result').classList.add('visible');
}
