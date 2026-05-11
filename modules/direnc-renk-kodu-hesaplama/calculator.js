const hcRkColors = [
    { name: 'Siyah', val: 0, mult: 1, tol: null, hex: '#000000', text: '#fff' },
    { name: 'Kahverengi', val: 1, mult: 10, tol: 1, hex: '#8B4513', text: '#fff' },
    { name: 'Kırmızı', val: 2, mult: 100, tol: 2, hex: '#FF0000', text: '#fff' },
    { name: 'Turuncu', val: 3, mult: 1000, tol: null, hex: '#FFA500', text: '#000' },
    { name: 'Sarı', val: 4, mult: 10000, tol: null, hex: '#FFFF00', text: '#000' },
    { name: 'Yeşil', val: 5, mult: 100000, tol: 0.5, hex: '#008000', text: '#fff' },
    { name: 'Mavi', val: 6, mult: 1000000, tol: 0.25, hex: '#0000FF', text: '#fff' },
    { name: 'Mor', val: 7, mult: 10000000, tol: 0.1, hex: '#800080', text: '#fff' },
    { name: 'Gri', val: 8, mult: 100000000, tol: 0.05, hex: '#808080', text: '#fff' },
    { name: 'Beyaz', val: 9, mult: 1000000000, tol: null, hex: '#FFFFFF', text: '#000' },
    { name: 'Altın', val: null, mult: 0.1, tol: 5, hex: '#D4AF37', text: '#000' },
    { name: 'Gümüş', val: null, mult: 0.01, tol: 10, hex: '#C0C0C0', text: '#000' }
];

function hcRkInit() {
    const selects = document.querySelectorAll('.hc-rk-select');
    selects.forEach(s => {
        hcRkColors.forEach((c, idx) => {
            if (s.id === 'hc-rk-tol' && c.tol === null) return;
            if ((s.id === 'hc-rk-b1' || s.id === 'hc-rk-b2' || s.id === 'hc-rk-b3') && c.val === null) return;
            
            const opt = document.createElement('option');
            opt.value = idx;
            opt.text = c.name;
            opt.style.backgroundColor = c.hex;
            opt.style.color = c.text;
            s.appendChild(opt);
        });
    });
}

function hcRkDegistir() {
    const bants = document.getElementById('hc-rk-bant-sayisi').value;
    document.getElementById('hc-rk-b3-grup').style.display = bants === '5' ? 'block' : 'none';
}

function hcResistorColorHesapla() {
    const bants = document.getElementById('hc-rk-bant-sayisi').value;
    const b1 = hcRkColors[document.getElementById('hc-rk-b1').value].val;
    const b2 = hcRkColors[document.getElementById('hc-rk-b2').value].val;
    const mult = hcRkColors[document.getElementById('hc-rk-mult').value].mult;
    const tol = hcRkColors[document.getElementById('hc-rk-tol').value].tol;

    let totalVal = 0;
    if (bants === '4') {
        totalVal = (b1 * 10 + b2) * mult;
    } else {
        const b3 = hcRkColors[document.getElementById('hc-rk-b3').value].val;
        totalVal = (b1 * 100 + b2 * 10 + b3) * mult;
    }

    let unit = ' Ω';
    let displayVal = totalVal;
    if (totalVal >= 1000000) {
        displayVal = totalVal / 1000000;
        unit = ' MΩ';
    } else if (totalVal >= 1000) {
        displayVal = totalVal / 1000;
        unit = ' kΩ';
    }

    document.getElementById('hc-rk-res-val').innerText = displayVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + unit;
    document.getElementById('hc-rk-res-tol').innerText = 'Tolerans: ±' + tol + '%';
    
    document.getElementById('hc-rk-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', hcRkInit);
// Immediate init if DOM already loaded (WP context)
if (document.readyState === 'complete' || document.readyState === 'interactive') {
    hcRkInit();
}
