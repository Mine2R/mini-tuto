fetch("http://localhost:8000")
  .then((r) => r.json())
  .then((data) => {
    if (!Array.isArray(data)) return;
    data.forEach(createCard);
  })
  .catch(console.error);

function createCard(item) {

  if (!item.cover_url) return;

  const link = document.createElement("a");
  link.href = "#";
  link.setAttribute("aria-label", item.title || "media");

  const card = document.createElement("div");
  card.classList.add("card");
  link.appendChild(card);

  const wrapper = document.createElement("div");
  wrapper.classList.add("wrapper");
  card.appendChild(wrapper);

  const cover = document.createElement("img");
  cover.classList.add("cover-image");
  cover.alt = (item.title || "") + " cover";
  cover.src = item.cover_url;
  wrapper.appendChild(cover);

  if (item.title_url) {
    const titleImg = document.createElement("img");
    titleImg.classList.add("title");
    titleImg.alt = (item.title || "") + " title";
    titleImg.src = item.title_url;
    card.appendChild(titleImg);
  }
  if (item.character_url) {
    const character = document.createElement("img");
    character.classList.add("character");
    character.alt = (item.title || "") + " character";
    character.src = item.character_url;
    card.appendChild(character);
  }

  const t = (item.title || "").toLowerCase();
if (t.includes("witcher") || t.includes("inception")) {
  card.classList.add("fit-tall");
}

  (document.getElementById("app")?.appendChild(link)) ||
    document.body.appendChild(link);
}

