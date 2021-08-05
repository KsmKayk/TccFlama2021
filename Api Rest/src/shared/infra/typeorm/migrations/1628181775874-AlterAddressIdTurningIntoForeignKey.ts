import { MigrationInterface, QueryRunner, TableForeignKey } from "typeorm";

export class AlterAddressIdTurningIntoForeignKey1628181775874
  implements MigrationInterface
{
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createForeignKey(
      "users",
      new TableForeignKey({
        name: "fk_address_id",
        columnNames: ["address_id"],
        referencedColumnNames: ["id"],
        referencedTableName: "users_addresses",
        onDelete: "SET NULL",
        onUpdate: "CASCADE",
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropForeignKey("users", "fk_address_id");
  }
}
