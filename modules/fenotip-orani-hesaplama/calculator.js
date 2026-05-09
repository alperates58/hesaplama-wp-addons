function hcFenotipOraniHesapla() {
    const type = document.getElementById('hc-pheno-type').value;
    const total = parseInt(document.getElementById('hc-pheno-count').value);

    if (isNaN(total) || total <= 0) {
        alert('Lütfen geçerli bir birey sayısı giriniz.');
        return;
    }

    let results = [];
    if (type === 'mono') {
        results = [
            { label: 'Baskın Fenotip (3/4)', count: (total * 3) / 4 },
            { label: 'Çekinik Fenotip (1/4)', count: (total * 1) / 4 }
        ];
    } else if (type === 'di') {
        results = [
            { label: 'Çift Baskın (9/16)', count: (total * 9) / 16 },
            { label: 'Baskın A, Çekinik b (3/16)', count: (total * 3) / 16 },
            { label: 'Çekinik a, Baskın B (3/16)', count: (total * 3) / 16 },
            { label: 'Çift Çekinik (1/16)', count: (total * 1) / 16 }
        ];
    } else {
        results = [
            { label: 'Baskın Fenotip (1/2)', count: (total * 1) / 2 },
            { label: 'Çekinik Fenotip (1/2)', count: (total * 1) / 2 }
        ];
    }

    let html = '';
    results.forEach(res => {
        html += `<li style="padding: 10px; background: rgba(255,255,255,0.05); margin-bottom: 5px; border-radius: 4px;">
            <strong>${res.label}:</strong> ${Math.round(res.count).toLocaleString('tr-TR')} birey
        </li>`;
    });

    document.getElementById('hc-pheno-list').innerHTML = html;
    document.getElementById('hc-pheno-result').classList.add('visible');
}
