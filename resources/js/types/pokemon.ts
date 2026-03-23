interface TopGames {
    name: string;
}

interface IconicPokemons {
    name: string;
}

interface PokemonTypes {
    primary: string;
    secondary: string | null;
}

interface PokemonAbility {
    name: string;
    is_hidden: boolean;
}

interface PokemonStat {
    base_stat: number;
}

interface PokemonStats {
    hp: PokemonStat;
    attack: PokemonStat;
    defense: PokemonStat;
    'special-attack': PokemonStat;
    'special-defense': PokemonStat;
    speed: PokemonStat;
}

interface Pokemon {
    name: string;
    types: PokemonTypes;
    abilities: PokemonAbility[];
    base_experience: number;
    stats: PokemonStats;
    height: number;
    weight: number;
    sprite: string;
}

export interface PokemonPageProps {
    topGames: TopGames[];
    iconicPokemons: IconicPokemons[];
    myFavoritesPokemons: Pokemon[];
}
