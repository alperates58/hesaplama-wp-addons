function hcPoissonHesapla() {
    const et = parseFloat(document.getElementById('hc-po-trans').value);
    const ea = parseFloat(document.getElementById('hc-po-axial').value);

    if (isNaN(et) || isNaN(ea) || ea === 0) {
        alert('Lütfen geçerli değerler girin (Boyuna şekil değiştirme sıfır olamaz).');
        return;
    }

    // Poisson Oranı ν = -ε_trans / ε_axial
    // Genellikle değerler mutlak alınır veya eksili çıkarsa düzeltilir
    const nu = Math.abs(et / ea);

    document.getElementById('hc-po-res-total').innerText = nu.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    const mat = document.getElementById('hc-po-material');
    if (nu >= 0.25 && nu <= 0.35) {
        mat.innerText = "Referans: Çelik (~0.30), Alüminyum (~0.33)";
    } else if (nu > 0.45 && nu <= 0.5) {
        mat.innerText = "Referans: Kauçuk, Lastik (~0.50)";
    } else if (nu < 0.1) {
        mat.innerText = "Referans: Mantar (~0.0)";
    } else {
        mat.innerText = "";
    }

    document.getElementById('hc-po-result').classList.add('visible');
}
