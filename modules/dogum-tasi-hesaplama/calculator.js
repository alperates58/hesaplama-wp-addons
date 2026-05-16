function hcDogumTasiHesapla() {
    const month = parseInt(document.getElementById('hc-bt-month').value);
    
    const stones = {
        1: { name: "Lal (Garnet)", desc: "Sadakat, güç ve sağlık sembolüdür. Negatif enerjiden koruduğuna inanılır." },
        2: { name: "Ametist (Amethyst)", desc: "Huzur, denge ve içsel barış taşıdır. Zihni sakinleştirir ve sezgileri güçlendirir." },
        3: { name: "Akuamarin (Aquamarine)", desc: "Cesaret, umut ve gençlik sembolüdür. Berraklık ve sakinlik verir." },
        4: { name: "Elmas (Diamond)", desc: "Sonsuz aşk, güç ve saflık taşıdır. Kararlılığı ve özgüveni artırır." },
        5: { name: "Zümrüt (Emerald)", desc: "Bereket, aşk ve yeniden doğuş sembolüdür. Kalp enerjisini dengeler." },
        6: { name: "İnci (Pearl)", desc: "Masumiyet, zarafet ve saflık sembolüdür. Duygusal denge sağlar." },
        7: { name: "Yakut (Ruby)", desc: "Yaşam enerjisi, tutku ve cesaret taşıdır. Şans ve koruma getirdiğine inanılır." },
        8: { name: "Peridot", desc: "Pozitif enerji, neşe ve gelişim taşıdır. Stresi azaltır ve bolluk getirir." },
        9: { name: "Safir (Sapphire)", desc: "Bilgelik, sadakat ve asalet sembolüdür. Odaklanmayı ve zihinsel disiplini artırır." },
        10: { name: "Opal", desc: "Umut, yaratıcılık ve saflık taşıdır. Hayal gücünü canlandırır." },
        11: { name: "Sitrin (Citrine)", desc: "Başarı, enerji ve neşe taşıdır. Zenginlik ve pozitiflik çektiğine inanılır." },
        12: { name: "Turkuaz (Turquoise)", desc: "Koruma, şans ve şifa taşıdır. İletişimi güçlendirir ve denge sağlar." }
    };

    const myStone = stones[month];

    document.getElementById('hc-bt-value').innerText = myStone.name;
    document.getElementById('hc-bt-desc').innerHTML = `<p>${myStone.desc}</p>`;
    document.getElementById('hc-dogum-tasi-result').classList.add('visible');
}
