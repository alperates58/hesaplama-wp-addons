function hcAlanSecimDegisti() {
    const shape = document.getElementById('hc-area-shape').value;
    const groupA = document.getElementById('group-a');
    const groupB = document.getElementById('group-b');
    const groupH = document.getElementById('group-h');
    const labelA = document.getElementById('label-a');
    const labelB = document.getElementById('label-b');
    const labelH = document.getElementById('label-h');
    const formula = document.getElementById('hc-area-formula');

    // Reset visibility
    groupA.classList.remove('hc-hidden');
    groupB.classList.add('hc-hidden');
    groupH.classList.add('hc-hidden');

    switch (shape) {
        case 'kare':
            labelA.innerText = 'Kenar (a)';
            formula.innerText = '* Formül: a²';
            break;
        case 'dikdortgen':
            labelA.innerText = 'Uzun Kenar (a)';
            labelB.innerText = 'Kısa Kenar (b)';
            groupB.classList.remove('hc-hidden');
            formula.innerText = '* Formül: a * b';
            break;
        case 'daire':
            labelA.innerText = 'Yarıçap (r)';
            formula.innerText = '* Formül: π * r²';
            break;
        case 'ucgen':
            labelA.innerText = 'Taban (b)';
            labelH.innerText = 'Yükseklik (h)';
            groupH.classList.remove('hc-hidden');
            formula.innerText = '* Formül: (b * h) / 2';
            break;
        case 'yamuk':
            labelA.innerText = 'Alt Taban (a)';
            labelB.innerText = 'Üst Taban (b)';
            labelH.innerText = 'Yükseklik (h)';
            groupB.classList.remove('hc-hidden');
            groupH.classList.remove('hc-hidden');
            formula.innerText = '* Formül: ((a + b) / 2) * h';
            break;
    }
}

function hcAlanHesapla() {
    const shape = document.getElementById('hc-area-shape').value;
    const a = parseFloat(document.getElementById('hc-area-a').value);
    const b = parseFloat(document.getElementById('hc-area-b').value);
    const h = parseFloat(document.getElementById('hc-area-h').value);

    let area = 0;

    switch (shape) {
        case 'kare':
            if (isNaN(a)) { alert('Lütfen kenar uzunluğunu girin.'); return; }
            area = a * a;
            break;
        case 'dikdortgen':
            if (isNaN(a) || isNaN(b)) { alert('Lütfen her iki kenarı da girin.'); return; }
            area = a * b;
            break;
        case 'daire':
            if (isNaN(a)) { alert('Lütfen yarıçapı girin.'); return; }
            area = Math.PI * a * a;
            break;
        case 'ucgen':
            if (isNaN(a) || isNaN(h)) { alert('Lütfen taban ve yüksekliği girin.'); return; }
            area = (a * h) / 2;
            break;
        case 'yamuk':
            if (isNaN(a) || isNaN(b) || isNaN(h)) { alert('Lütfen tüm değerleri girin.'); return; }
            area = ((a + b) / 2) * h;
            break;
    }

    document.getElementById('hc-res-area-val').innerText = area.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' birim²';
    document.getElementById('hc-area-result').classList.add('visible');
}
