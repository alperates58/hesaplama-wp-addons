function hcKemerÖlçüsüHesapla() {
    const waist = parseFloat(document.getElementById('hc-belt-waist').value);
    const pants = parseFloat(document.getElementById('hc-belt-pants').value);

    let beltSize = 0;

    if (waist) {
        // Bel ölçüsüne yaklaşık 5cm eklenir.
        beltSize = Math.round((waist + 5) / 5) * 5; // 5'in katlarına yuvarla
    } else if (pants) {
        // Pantolon bedenine 2 inç (5cm) eklenir.
        beltSize = Math.round(((pants + 2) * 2.54) / 5) * 5;
    } else {
        return;
    }

    document.getElementById('hc-belt-val').innerText = beltSize + ' cm';
    document.getElementById('hc-belt-result').classList.add('visible');
}
