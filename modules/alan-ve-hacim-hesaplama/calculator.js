const hcAhSekiller = {
    alan: {
        kare: { ad: "Kare", inputs: ["Kenar (a)"] },
        dikdortgen: { ad: "Dikdörtgen", inputs: ["Uzun Kenar (a)", "Kısa Kenar (b)"] },
        daire: { ad: "Daire", inputs: ["Yarıçap (r)"] },
        ucgen: { ad: "Üçgen", inputs: ["Taban (b)", "Yükseklik (h)"] },
        yamuk: { ad: "Yamuk", inputs: ["Üst Taban (a)", "Alt Taban (c)", "Yükseklik (h)"] }
    },
    hacim: {
        kup: { ad: "Küp", inputs: ["Kenar (a)"] },
        dikdortgen_prizma: { ad: "Dikdörtgen Prizma", inputs: ["En (a)", "Boy (b)", "Yükseklik (h)"] },
        kure: { ad: "Küre", inputs: ["Yarıçap (r)"] },
        silindir: { ad: "Silindir", inputs: ["Yarıçap (r)", "Yükseklik (h)"] },
        koni: { ad: "Koni", inputs: ["Yarıçap (r)", "Yükseklik (h)"] }
    }
};

function hcAlanHacimModDegistir() {
    const mod = document.getElementById('hc-ah-mod').value;
    const sekilSelect = document.getElementById('hc-ah-sekil');
    sekilSelect.innerHTML = '';
    
    Object.keys(hcAhSekiller[mod]).forEach(key => {
        const option = document.createElement('option');
        option.value = key;
        option.text = hcAhSekiller[mod][key].ad;
        sekilSelect.add(option);
    });
    
    hcAlanHacimSekilDegistir();
}

function hcAlanHacimSekilDegistir() {
    const mod = document.getElementById('hc-ah-mod').value;
    const sekil = document.getElementById('hc-ah-sekil').value;
    const inputsDiv = document.getElementById('hc-ah-inputs');
    inputsDiv.innerHTML = '';
    
    const fields = hcAhSekiller[mod][sekil].inputs;
    fields.forEach((label, index) => {
        const div = document.createElement('div');
        div.className = 'hc-form-group';
        div.innerHTML = `
            <label>${label}</label>
            <input type="number" class="hc-ah-dynamic-input" id="hc-ah-in-${index}" step="0.01">
        `;
        inputsDiv.appendChild(div);
    });
}

function hcAlanHacimHesapla() {
    const mod = document.getElementById('hc-ah-mod').value;
    const sekil = document.getElementById('hc-ah-sekil').value;
    const inputs = document.querySelectorAll('.hc-ah-dynamic-input');
    const vals = Array.from(inputs).map(i => parseFloat(i.value));

    if (vals.some(v => isNaN(v))) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    let sonuc = 0;
    let birim = (mod === 'alan') ? 'm²' : 'm³';

    if (mod === 'alan') {
        switch(sekil) {
            case 'kare': sonuc = vals[0] * vals[0]; break;
            case 'dikdortgen': sonuc = vals[0] * vals[1]; break;
            case 'daire': sonuc = Math.PI * Math.pow(vals[0], 2); break;
            case 'ucgen': sonuc = (vals[0] * vals[1]) / 2; break;
            case 'yamuk': sonuc = ((vals[0] + vals[1]) / 2) * vals[2]; break;
        }
    } else {
        switch(sekil) {
            case 'kup': sonuc = Math.pow(vals[0], 3); break;
            case 'dikdortgen_prizma': sonuc = vals[0] * vals[1] * vals[2]; break;
            case 'kure': sonuc = (4/3) * Math.PI * Math.pow(vals[0], 3); break;
            case 'silindir': sonuc = Math.PI * Math.pow(vals[0], 2) * vals[1]; break;
            case 'koni': sonuc = (1/3) * Math.PI * Math.pow(vals[0], 2) * vals[1]; break;
        }
    }

    document.getElementById('hc-ah-res-label').innerText = (mod === 'alan' ? 'Alan' : 'Hacim') + ':';
    document.getElementById('hc-ah-res-val').innerText = sonuc.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' ' + birim;
    document.getElementById('hc-alan-hacim-result').classList.add('visible');
}

// Init
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('hc-ah-mod')) {
        hcAlanHacimModDegistir();
    }
});
