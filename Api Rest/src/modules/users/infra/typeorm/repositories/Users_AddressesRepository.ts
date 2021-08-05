import { getRepository, Not, Repository } from "typeorm";
import User_Address from "../entities/User_Address";
import IUsers_AddressesRepository from "@modules/users/repositories/IUsers_AddressesRepository";
import ICreateAddressDTO from "@modules/users/dtos/ICreateAddressDTO";
import axios from "axios";
import AppError from "@shared/errors/AppError";

class UsersRepository implements IUsers_AddressesRepository {
  private ormRepository: Repository<User_Address>;

  constructor() {
    this.ormRepository = getRepository(User_Address);
  }

  public async create(addressData: ICreateAddressDTO): Promise<User_Address> {
    const response = await axios.get(
      `https://viacep.com.br/ws/${addressData.cep}/json/`
    );
    const data = response.data;
    if (!data) {
      throw new AppError("Error while getting data");
    }

    const user_address_data = {
      cep: addressData.cep,
      city: data.localidade,
      complement: data.complemento,
      street: data.logradouro,
      state: data.uf,
      house_number: addressData.house_number,
    };
    const user_address = this.ormRepository.create(user_address_data);

    await this.ormRepository.save(user_address);

    return user_address;
  }
}

export default UsersRepository;
