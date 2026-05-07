function hcUpdateAreaFields() {
    const shape = document.getElementById('hc-area-shape').value;
    const container = document.getElementById('hc-area-fields');
    let html = '';

    if (shape === 'kare') {
        html = `
            <div class="hc-form-grid">
                <div class="hc-form-group"><label>Kenar 1</label><input type="number" id="hc-a-k1"></div>
                <div class="hc-form-group"><label>Kenar 2</label><input type="number" id="hc-a-k2"></div>
            </div>`;
    } else if (shape === 'daire') {
        html = `<div class="hc-form-group"><label>Yarıçap (r)</label><input type="number" id="hc-a-r"></div>`;
    } else if (shape === 'ucgen') {
        html = `
            <div class="hc-form-grid">
                <div class="hc-form-group"><label>Taban</label><input type="number" id="hc-a-b"></div>
                <div class="hc-form-group"><label>Yükseklik</label><input type="number" id="hc-a-h"></div>
            </div>`;
    } else if (shape === 'yamuk') {
        html = `
            <div class="hc-form-grid">
                <div class="hc-form-group"><label>Üst Taban (a)</label><input type="number" id="hc-a-base1"></div>
                <div class="hc-form-group"><label>Alt Taban (b)</label><input type="number" id="hc-a-base2"></div>
                <div class="hc-form-group" style="grid-column: span 2;"><label>Yükseklik (h)</label><input type="number" id="hc-a-h-yamuk"></div>
            </div>`;
    }

    container.innerHTML = html;
    document.getElementById('hc-area-result').classList.remove('visible');
}

function hcAlanHesapla() {
    const shape = document.getElementById('hc-area-shape').value;
    let area = 0;

    try {
        if (shape === 'kare') {
            const k1 = parseFloat(document.getElementById('hc-a-k1').value);
            const k2 = parseFloat(document.getElementById('hc-a-k2').value);
            area = k1 * k2;
        } else if (shape === 'daire') {
            const r = parseFloat(document.getElementById('hc-a-r').value);
            area = Math.PI * r * r;
        } else if (shape === 'ucgen') {
            const b = parseFloat(document.getElementById('hc-a-b').value);
            const h = parseFloat(document.getElementById('hc-a-h').value);
            area = (b * h) / 2;
        } else if (shape === 'yamuk') {
            const a = parseFloat(document.getElementById('hc-a-base1').value);
            const b = parseFloat(document.getElementById('hc-a-base2').value);
            const h = parseFloat(document.getElementById('hc-a-h-yamuk').value);
            area = ((a + b) * h) / 2;
        }

        if (isNaN(area)) throw "Hata";

        document.getElementById('hc-res-area-val').innerText = area.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
        document.getElementById('hc-area-result').classList.add('visible');
    } catch (e) {
        alert('Lütfen tüm alanları doğru doldurun.');
    }
}

document.addEventListener('DOMContentLoaded', hcUpdateAreaFields);
if (document.readyState !== 'loading') hcUpdateAreaFields();
