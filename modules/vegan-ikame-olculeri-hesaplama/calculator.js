function hcVeganSubHesapla() {
    const type = document.getElementById('hc-vs-type').value;
    const val = parseFloat(document.getElementById('hc-vs-val').value);

    if (isNaN(val) || val <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    let list = '';
    if (type === 'egg') {
        list = `
            <ul style="text-align:left;">
                <li><strong>Keten Tohumu:</strong> ${val} yk keten tohumu + ${val * 3} yk su</li>
                <li><strong>Elma Püresi:</strong> ${Math.round(val * 60)} g</li>
                <li><strong>Muz:</strong> ${val * 0.5} adet ezilmiş olgun muz</li>
            </ul>
        `;
    } else if (type === 'milk') {
        list = `
            <ul style="text-align:left;">
                <li><strong>Badem / Soya Sütü:</strong> ${val} ml (1:1 Oran)</li>
                <li><strong>Hindistan Cevizi Sütü:</strong> ${val} ml (Daha yoğun kıvam)</li>
            </ul>
        `;
    } else {
        list = `
            <ul style="text-align:left;">
                <li><strong>Hindistan Cevizi Yağı:</strong> ${Math.round(val * 0.8)} g</li>
                <li><strong>Sıvı Yağ:</strong> ${Math.round(val * 0.75)} ml</li>
                <li><strong>Vegan Margarin:</strong> ${val} g (1:1 Oran)</li>
            </ul>
        `;
    }

    document.getElementById('hc-vs-res-list').innerHTML = list;
    document.getElementById('hc-vegan-sub-result').classList.add('visible');
}
