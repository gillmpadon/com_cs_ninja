const goPage = (str) => window.location.href = (str=="play")? `app/signin.php`:`${str}.html`
function heroDetails_Selected(id,name,photo,intelligence,strength,speed,nickname,story){
    return {id:id, name: name, photo: photo,intelligence: intelligence, strength: strength, speed: speed,nickname:nickname ,story:story }
}

//DOM
const avatar_photo = document.getElementById('avatar_photo');
const avatar_name = document.getElementById('avatar_name');
const avatar_intelligence = document.getElementById('avatar_intelligence');
const avatar_strength = document.getElementById('avatar_strength');
const avatar_speed = document.getElementById('avatar_speed');
const avatar_story = document.getElementById('avatar_story');

//array
const heroData = [
  [1, 'Hiroshi', 'hiroshi.png', 85, 60, 90, "Hiroshi - The Electric Inventor", "Hiroshi, a brilliant and innovative wizard, is renowned for his mastery of lightning magic and his incredible inventions. Holding a staff infused with immense electric power, Hiroshi can unleash bolts of lightning that crackle with energy. He is known as the Electric Inventor due to his ability to harness and control electricity like no other. His inventions and magical prowess have made him a respected figure in the wizarding community."],
  [2, 'Ryota', 'ryota.png', 75, 95, 80, "Ryota - The Wind Archer", "Ryota, a wizard with an affinity for the wind element, draws his power from the ancient elves. He is equipped with a magical bow and arrows crafted from the essence of the wind itself. As the Wind Archer, Ryota can summon gusts of wind, manipulate air currents, and launch arrows that carry the force of the wind's might. His connection to nature and mastery of wind magic make him an agile and formidable opponent on the battlefield."],
  [3, 'Kazuki', 'kazuki.png', 95, 70, 70, "Kazuki - The Assassin", "Kazuki is a mysterious and skilled assassin who operates in the shadows. With his black armor and a mask concealing his identity, he strikes fear into the hearts of his enemies. Kazuki wields a deadly dagger with precision and speed, making him a formidable close-quarters combatant. He comes from a royal lineage but chose the path of stealth and darkness to protect the kingdom from threats that lurk in the shadows."],
  [4, 'Takumi', 'takumi.png', 80, 100, 90, "Takumi - The Mighty Warrior", "Takumi, the captain of the castle warriors, is a towering figure with immense strength. Clad in armor and wielding a shield and sword, he stands as a beacon of hope and inspiration for his comrades. Known as the Mighty Warrior, Takumi leads by example, fearlessly charging into battles, and displaying remarkable resilience. His unwavering determination and strategic mind have earned him respect both on and off the battlefield."],
  [5, 'Sakura', 'sakura.png', 85, 50, 95, "Sakura - The Princess of Water", "Sakura, born of the goddess of water, possesses the inherent power of the water element. As the Princess of Water, she can command and manipulate water with ease. Her abilities include summoning torrents of water, creating protective barriers, and healing wounds. Sakura's serene demeanor and compassionate nature guide her as she uses her water magic to bring balance and harmony to the world."],
  [6, 'Hikari', 'hikari.png', 70, 95, 80, "Hikari - The Fiery Sorceress", "Hikari, the daughter of powerful witches, possesses the gift of fire manipulation. She can summon flames in her hands, creating fiery displays of immense heat and power. Hikari's control over the fire element is unrivaled, and her skills as a sorceress allow her to wield flames with grace and precision. With her fiery nature and determination, she embraces her role as the Fiery Sorceress, using her powers to protect her loved ones and uphold justice."],
  [7, 'Aya', 'aya.png', 80, 85, 70, "Aya - The Princess Shieldmaiden", "Aya, a courageous and determined princess, is known as the Shieldmaiden. She carries a shield and a sword, ready to defend her kingdom with unwavering loyalty. Aya is skilled in both offense and defense, embodying the spirit of a true warrior. Despite her noble lineage, she eschews a life of luxury, opting to lead from the frontlines, protecting her people, and standing against any who threaten their safety."],
  [8, 'Yumi', 'yumi.png', 50, 100, 60, "Yumi - The Royal Archery", "Yumi, a member of the royal family, possesses unparalleled skill with a bow and arrow. Her precision and accuracy make her the kingdom's finest archer. Yumi's regal upbringing has instilled in her a sense of duty and grace, which she carries into battle. With her bow in hand, she strikes from a distance, swiftly eliminating foes with her expert marksmanship. Yumi's prowess as an archer has become the stuff of legends, earning her the title of the Royal Archery."]
];


//switch
function updateHero() {
  const heroStorage = localStorage.getItem('avatarSelect');
  let selectedHero;

  switch (heroStorage) {
    case "1":
      selectedHero = heroDetails_Selected(...heroData[0]);
      break;
    case "2":
      selectedHero = heroDetails_Selected(...heroData[1]);
      break;
    case "3":
      selectedHero = heroDetails_Selected(...heroData[2]);
      break;
    case "4":
      selectedHero = heroDetails_Selected(...heroData[3]);
      break;
    case "5":
      selectedHero = heroDetails_Selected(...heroData[4]);
      break;
    case "6":
      selectedHero = heroDetails_Selected(...heroData[5]);
      break;
    case "7":
      selectedHero = heroDetails_Selected(...heroData[6]);
      break;
    case "8":
      selectedHero = heroDetails_Selected(...heroData[7]);
      break;
    default:
      selectedHero = heroDetails_Selected(...heroData[0]);
      break;
  }

  localStorage.setItem("selectedHero", JSON.stringify(selectedHero));

  var selectedHeroString = localStorage.getItem("selectedHero");
  var selectedHeroObject = JSON.parse(selectedHeroString);

  var { name, photo, intelligence, strength, speed, nickname, story } = selectedHeroObject;
  avatar_photo.src = `images/${photo}`;
  avatar_name.textContent = nickname;
  avatar_intelligence.textContent = intelligence;
  avatar_strength.textContent = strength;
  avatar_speed.textContent = speed;
  avatar_story.textContent = story;
}

//if else

if(!localStorage.getItem('avatarSelect')){
    localStorage.setItem('avatarSelect', Math.floor(Math.random()*(8-1+1)+1));
}else{
    console.log('Avatar is Set')
}

function selectAvatar(avatar){
    localStorage.setItem('avatarSelect', avatar);
    updateHero();
    const section = document.getElementById('heroPage');
    section.scrollIntoView({ behavior: 'smooth' });

}




  const viewportWidth = window.innerWidth;
  const page = document.getElementById('page');

  if (viewportWidth <= 425) {
    const navIcon = document.getElementById('icon');
    navIcon.addEventListener('click', function() {
    if(page.style.display == 'none') {
        page.style.display = 'block';
    }else{
        page.style.display = 'none';
    }
    })
  }else{
    page.style.display = 'flex';
  } 