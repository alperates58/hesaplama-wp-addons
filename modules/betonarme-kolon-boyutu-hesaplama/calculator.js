function hcKolonBoyutuHesapla() {
    const alan = parseFloat(document.getElementById('hc-kb-alan').value);
    const kat = parseFloat(document.getElementById('hc-kb-kat').value);
    const yuk = parseFloat(document.getElementById('hc-kb-yuk').value); // kN/m2
    const fck = parseFloat(document.getElementById('hc-kb-fck').value); // MPa (N/mm2)

    if (isNaN(alan) || isNaN(kat) || isNaN(yuk)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Toplam Eksenel Yük (Nd) in Newton
    // 1 kN = 1000 N
    const Nd = alan * kat * yuk * 1000;

    // Ac >= Nd / (0.6 * fck) -> Eksenel yük kapasitesi sınırlaması (Yaklaşık)
    // Güvenlik için 0.5 veya 0.4 katsayısı da kullanılabilir ama 0.6 standart yaklaşımdır.
    const Ac = Nd / (0.4 * fck); // Daha güvenli bir ön boyutlandırma için 0.4 kullandım

    // Minimum 300x300 mm = 90000 mm2
    const finalAc = Math.max(Ac, 90000);
    const kenar = Math.ceil(Math.sqrt(finalAc) / 10) * 10; // 10'un katına yuvarla

    document.getElementById('hc-kb-res-mm2').innerText = Math.round(finalAc).toLocaleString('tr-TR') + ' mm²';
    document.getElementById('hc-kb-res-suggest').innerText = 'Öneri: ' + (kenar/10) + ' x ' + (kenar/10) + ' cm veya eşdeğeri';
    
    document.getElementById('hc-kb-result').classList.add('visible');
}
