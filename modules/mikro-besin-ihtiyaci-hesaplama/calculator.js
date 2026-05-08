function hcMikroBesinHesapla() {
    const cinsiyet = document.getElementById('hc-mn-cinsiyet').value;
    const yas = document.getElementById('hc-mn-yas').value;
    const tbody = document.getElementById('hc-mn-table-body');
    tbody.innerHTML = '';

    const data = [
        { name: 'Vitamin A', m: '900 mcg', f: '700 mcg' },
        { name: 'Vitamin C', m: '90 mg', f: '75 mg' },
        { name: 'Vitamin D', m: '15 mcg (600 IU)', f: '15 mcg (600 IU)' },
        { name: 'Vitamin E', m: '15 mg', f: '15 mg' },
        { name: 'Vitamin K', m: '120 mcg', f: '90 mcg' },
        { name: 'Vitamin B1 (Tiamin)', m: '1.2 mg', f: '1.1 mg' },
        { name: 'Vitamin B2 (Riboflavin)', m: '1.3 mg', f: '1.1 mg' },
        { name: 'Vitamin B3 (Niasin)', m: '16 mg', f: '14 mg' },
        { name: 'Vitamin B6', m: yas === '51+' ? '1.7 mg' : '1.3 mg', f: yas === '51+' ? '1.5 mg' : '1.3 mg' },
        { name: 'Vitamin B12', m: '2.4 mcg', f: '2.4 mcg' },
        { name: 'Folat (B9)', m: '400 mcg', f: '400 mcg' },
        { name: 'Kalsiyum', m: yas === '51+' ? '1000-1200 mg' : '1000 mg', f: yas === '51+' ? '1200 mg' : '1000 mg' },
        { name: 'Demir', m: '8 mg', f: yas === '51+' ? '8 mg' : '18 mg' },
        { name: 'Magnezyum', m: '400-420 mg', f: '310-320 mg' },
        { name: 'Çinko', m: '11 mg', f: '8 mg' },
        { name: 'Selenyum', m: '55 mcg', f: '55 mcg' },
        { name: 'Potasyum', m: '3400 mg', f: '2600 mg' }
    ];

    data.forEach(item => {
        const tr = document.createElement('tr');
        const val = (cinsiyet === 'erkek') ? item.m : item.f;
        tr.innerHTML = `
            <td style="padding: 8px; border: 1px solid #ddd;">${item.name}</td>
            <td style="padding: 8px; border: 1px solid #ddd; text-align: right;">${val}</td>
        `;
        tbody.appendChild(tr);
    });

    document.getElementById('hc-mikro-besin-result').classList.add('visible');
}
